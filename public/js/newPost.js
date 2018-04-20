'use strict';

//Text area for post

let textarea = document.querySelector('#new_post_ta');
let postButton = document.querySelector('#postbutton');

textarea.addEventListener('focus',function(){
  textarea.style.height = '150px';
  postButton.style.display = 'flex';
})

textarea.style.transition = "height 0.5s";

textarea.addEventListener('focusout',function(){
  textarea.style.height = '30px';
  postButton.style.display = 'none';
})