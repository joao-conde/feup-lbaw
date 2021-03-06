'use strict';

//Animation to switch chat

let chat = document.querySelector('#chat');
let feed = document.querySelector('.toggleContent');

let chatButton = document.querySelector('#chatButton');
let feedButton = document.querySelector('#homeButton');

// chat.style.transition = "all 0.5s";
// feed.style.transition = "all 0.5s";

chatButton.addEventListener('click', function() {

  // chat.style.transform = "translate(0,0)";
  // feed.style.transform = "translate(-100%,0)";

  // chat.style.display = "block";
  // feed.style.display = "none";

  chat.selfShow();
  feed.selfHide();

  console.log(chat.style);

})

feedButton.addEventListener('click', function(){

  // chat.style.transform = "translate(100%,0)"
  // feed.style.transform = "translate(0,0)"

  // chat.style.display = "none";
  // feed.style.display = "block";

  chat.selfHide();
  feed.selfShow();

  console.log(feed.style.height);

})

window.addEventListener('resize', function(){

  if(window.innerWidth >= 768) {
    // chat.style.display = "block";
    // feed.style.display = "block";
    chat.selfShow();
    feed.selfShow();
  
  }

});