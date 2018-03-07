'use strict';

let textarea = document.querySelector('#new_post_ta');

textarea.addEventListener('focus',function(){
  textarea.style.height = '150px';
})

textarea.style.transition = "height 0.5s";

textarea.addEventListener('focusout',function(){
  textarea.style.height = '30px';
})

console.log(textarea.style);
