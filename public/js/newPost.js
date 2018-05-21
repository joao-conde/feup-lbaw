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
  let api = '/api/users/' + '20' + '/posts';
  
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


function handleCreatePostAPIResponse(response, type){

  if(response.status != 200)
    return;

  let data = JSON.parse(response.responseText);
  console.log(data);
  let posts_div = document.querySelector('#posts');

  let post = document.createElement('div');
  post.classList.add("jumbotron");
  post.classList.add("p-3");
  post.classList.add("post");
  post.classList.add("mb-2"); 
  
  posts_div.appendChild(post);

  //TODO: create a post with info (request more info)

  let header = document.createElement('div');
  header.classList.add("col");

  
  let img = document.createElement('img');
  img.classList.add("profile");
  img.classList.add("mr-2");
  img.src = "images/system/dummy_profile.svg";
  
  let link = document.createElement("a");
  link.classList.add("text-secondary");
  link.classList.add("align-middle");
  link.innerHTML = data.name;
  
  header.appendChild(img);
  header.appendChild(link);

  post.appendChild(header);

}

