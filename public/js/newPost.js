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


  //TODO: create a post with info (request more info)
  let post_div = document.querySelector('#posts');
  let new_post = document.createElement('div');
  new_post.classList.add('post');
  post_div.appendChild(new_post);

  let text = document.createElement('textarea');
  new_post.appendChild(text);

  let data = JSON.parse(response.responseText);
  

  new_post.innerHTML = data.content;
}

