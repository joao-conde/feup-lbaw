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
  let api = '/api/users/{userId}/posts';
  
  let data = {
    id:   25,
    private: false,
    content: textarea.value
  };

  //console.log("wat");
  let requestData = encodeForAjax(data);
  sendAsyncAjaxRequest(request, api, method, handleCreatePostAPIResponse.bind(textarea, request, "post"), URL_ENCODE, data);
  
})


textarea.addEventListener('focusout',function(){
  textarea.style.height = '30px';
})


function handleCreatePostAPIResponse(request, type){

  if(request.status != 200)
    return;

  let post_div = document.querySelector('#posts');
  let new_post = document.createElement('div');
  new_post.classList.add('post');
  post_div.appendChild(new_post);

  let text = document.createElement('textarea');
  new_post.appendChild(text);
  text.innerHTML = request.responseText;

  console.log("HANDLE AJAX RESPONSE:" + request.responseText);

  postButton.style.display = 'none';
}

