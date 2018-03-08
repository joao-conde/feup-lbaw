'use strict';

let textarea = document.querySelector('#new_post_ta');

textarea.addEventListener('focus',function(){
  textarea.style.height = '150px';
})

textarea.style.transition = "height 0.5s";

textarea.addEventListener('focusout',function(){
  textarea.style.height = '30px';
})

let chat = document.querySelector('#chat');
let feed = document.querySelector('#posts');

let chatButton = document.querySelector('#chatButton');
let feedButton = document.querySelector('#homeButton');


chat.style.display = "block";
chat.style.transform = "translate(100%,0)";

chat.style.transition = "all 0.5s";
feed.style.transition = "all 0.5s";


chatButton.addEventListener('click', function(){

  chat.style.transform = "translate(0,0)";
  feed.style.transform = "translate(-100%,0)";

  // feed.style.height = "0";

  console.log(chat.style);

})

feedButton.addEventListener('click', function(){

  chat.style.transform = "translate(100%,0)"
  feed.style.transform = "translate(0,0)"

  console.log(feed.style.height);

})

window.addEventListener('resize', function(){

  if(window.innerWidth >= 768) {
    chat.style.display = "block";
    feed.style.display = "block";

  }

  else {
    chat.style.display = "none";
    feed.style.display = "block";
  }

});
