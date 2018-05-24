'use strict';

//Create Post

let textarea = document.querySelector('#new_post_ta');
let postButton = document.querySelector('#postbutton');

if(textarea != null) {

  textarea.addEventListener('focus',function(){
    textarea.style.height = '150px';
    postButton.style.display = 'flex';
  })

  textarea.style.transition = "height 0.5s";

  textarea.addEventListener('focusout',function(){
    textarea.style.height = '30px';
  })
}

if(postButton != null) {

  postButton.addEventListener('click', function(){

    let request = new XMLHttpRequest();
    let method = POST;
  
    let api = '/api/users/' + userId + '/posts';
    
    let data = {
      private: false,
      content: textarea.value
    };
  
    sendAsyncAjaxRequest(request, api, method, handleCreatePostAPIResponse.bind(textarea, request, "post"), JSON_ENCODE,JSON.stringify(data));
    postButton.style.display = 'none';
  })

}

function handleCreatePostAPIResponse(response){

  if(response.status != 200)
    return;

  let data = JSON.parse(response.responseText);

  buildPost(data);
  this.value = "";
}

function buildPost(data) {

  let posts_div = document.querySelector('#center_content');
  let post = document.createElement('div');
  
  let postid_div = document.createElement('div');
  let post_buttons = document.createElement('div');
  let span_delete = document.createElement('span');
  let delete_i = document.createElement('i');
  let span_edit = document.createElement('span');
  let edit_i = document.createElement('i');


  let header = document.createElement('div');
  let id_div = document.createElement('div');
  let img = document.createElement('img');
  let link = document.createElement("a");
  let date_div = document.createElement('div');
  let small = document.createElement('small');
  let i = document.createElement('i');
  
  let content = document.createElement('div');
  let content_div2 = document.createElement('div');
  let small_content = document.createElement("small");
  
  postid_div.classList.add("d-none");
  postid_div.id = "postID";
  postid_div.innerHTML = data.postid;
  
  span_delete.id = "delete_post_button";
  span_edit.id = "edit_post_button";

  delete_i.classList.add("fas", "fa-times", "text_danger");
  edit_i.classList.add("fas",  "fa-pencil-alt");

  span_delete.appendChild(delete_i);
  span_edit.appendChild(edit_i);

  post_buttons.appendChild(span_delete);
  post_buttons.appendChild(span_edit);

  post.appendChild(postid_div);
  post.appendChild(post_buttons);

  posts_div.insertBefore(post, posts_div.children[1]);
  post.appendChild(header);
  post.appendChild(content);


  header.appendChild(id_div);
  header.appendChild(date_div);

  id_div.appendChild(img);
  id_div.appendChild(link);
  
  date_div.appendChild(small);
  small.appendChild(i);

  content.appendChild(content_div2);
  content_div2.appendChild(small_content);


  header.classList.add("row", "mb-3", "justify-content-between");
  
  content.classList.add("row", "justify-content-start");

  content_div2.classList.add("col", "align-self-center", "text-justify")

  post.classList.add("jumbotron", "p-3", "post", "mb-2");
  
  id_div.classList.add("col");
  
  img.classList.add("profile", "mr-2");
  img.src = "/images/system/dummy_profile.svg";
  
  link.classList.add("text-secondary", "align-middle");
    
  date_div.classList.add("col-4", "text-right");
  
  i.classList.add("text-secondary");

  small_content.innerHTML = data.content;
  link.innerHTML = data.name;
  i.innerHTML = data.date;

  let postId = data.postid;

  span_delete.addEventListener('click', handlerDeletePost.bind(this,postId, userId));

  console.log(data);

}

function handlerDeletePost(postId, userId) {

  let request = new XMLHttpRequest();
  let method = DELETE;
  let api = '/api/users/' + userId + '/posts/' + postId;
  
  let data = {
    postid: postId
  };

  sendAsyncAjaxRequest(request, api, method, handleDeletePostAPIResponse.bind(this,request, "delete"), JSON_ENCODE, JSON.stringify(data));  
 
}



//Delete Post

let posts = document.querySelectorAll('.post');

for(let i = 1; i < posts.length; i++){
  
  let deletePostBtn = posts[i].querySelector('#delete_post_button');
  let postId = posts[i].querySelector('#postID').innerHTML;

  if(deletePostBtn == null)
    continue;

  deletePostBtn.addEventListener('click', handlerDeletePost.bind(this,postId, userId));

}

function handleDeletePostAPIResponse(request){

  if(request.status != 200)
    return;

  let data = JSON.parse(request.responseText);
  let posts = document.querySelectorAll('.post');
  let postidToDelete = data.postid;

  for(let i = 1; i < posts.length; i++){
    
    let postId = posts[i].querySelector('#postID').innerHTML;
    if(postId == postidToDelete){
      posts[i].parentNode.removeChild(posts[i]);
      break;
    }

  }
}

let globalOffset = 1;

const NUMBER_OF_POSTS_IN_REQUEST = 5;
let globalBand = document.querySelector('p#bandId');

let globalBandId;

if(globalBand != null)

  globalBandId = globalBand.innerHTML;


function getPosts() {

  let type = document.querySelector('p#posts_page_type').innerHTML;  
  let api = (type == 'band') ? '/api/bands/'+ globalBandId +'/posts': '/api/users/'+ userId +'/posts';
  
  let request = new XMLHttpRequest();
  let data = {offset: globalOffset++ * 5, type:type}

  sendAsyncAjaxRequest(request,api,GET,getPostsAjaxRequestListener,URL_ENCODE,data);

}

function getPostsAjaxRequestListener() {

    if(this.status != 200)
        return;

    let postsList = document.querySelector('div#center_content');

    postsList.innerHTML += this.responseText;

    window.scrollBy(0,300);
    window.addEventListener('scroll', sendPostRequest);

}

window.addEventListener('scroll', sendPostRequest);

function sendPostRequest() {

    if(isBottomOfPage() == true) {
        window.removeEventListener('scroll',sendPostRequest);
        getPosts();
    }

}
