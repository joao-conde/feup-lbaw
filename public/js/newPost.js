'use strict';

let textarea = document.querySelector('#new_post_ta');
let postButton = document.querySelector('#postbutton');

textarea.addEventListener('focus',function(){
  textarea.style.height = '150px';
  postButton.style.display = 'flex';
})

textarea.style.transition = "height 0.5s";

postButton.addEventListener('click', function(){

  let request = new XMLHttpRequest();
  let method = POST;

  //TODO: change to user ID
  let api = '/api/users/{userID}/posts';
  
  let data = {
    private: false,
    content: textarea.value
  };

  sendAsyncAjaxRequest(request, api, method, handleCreatePostAPIResponse.bind(textarea, request, "post"), JSON_ENCODE,JSON.stringify(data));
  postButton.style.display = 'none';
})


textarea.addEventListener('focusout',function(){
  textarea.style.height = '30px';
})


function handleCreatePostAPIResponse(response){

  if(response.status != 200)
    return;

  let data = JSON.parse(response.responseText);

  buildPost(data);

}

function buildPost(data){

  let posts_div = document.querySelector('#posts');
  let post = document.createElement('div');
  
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
  img.src = "images/system/dummy_profile.svg";
  
  link.classList.add("text-secondary", "align-middle");
    
  date_div.classList.add("col-4", "text-right");
  
  i.classList.add("text-secondary");

  small_content.innerHTML = data.content;
  link.innerHTML = data.name;
  i.innerHTML = data.date;
}