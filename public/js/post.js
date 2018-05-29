'use strict';

let lockButton = document.querySelector('span#lock_opened');
let unlockButton = document.querySelector('span#lock_locked');
let privatePost = false;


if (lockButton != null) {

  lockButton.addEventListener('click', togglePrivatePost.bind(true));
  unlockButton.addEventListener('click', togglePrivatePost.bind(false));

}

function togglePrivatePost() {
  privatePost = this;

  if (privatePost == true) {
    unlockButton.selfShow();
    lockButton.selfHide();
  }

  else {
    lockButton.selfShow();
    unlockButton.selfHide();
  }

}

//Create Post

let textarea = document.querySelector('#new_post_ta');
let postButton = document.querySelector('#postbutton');
let postList = document.querySelector('div#posts');

if (postButton != null) {

  let postInput = postButton.querySelector('[type=submit]');

  textarea.addEventListener('input', function () {

    postInput.disabled = textarea.value.trim().length == 0;

  });

}



if (textarea != null) {

  textarea.addEventListener('focus', function () {
    textarea.style.height = '150px';
    postButton.style.display = 'flex';
  })

  textarea.style.transition = "height 0.5s";

}



if (postButton != null) {

  postButton.addEventListener('click', function () {

      switch (currentMedia) {
        case NO_MEDIA:
          sendCreatePostRequest();
          break;

        case MEDIA_SOUND:
          sendCreatePostRequestWithSoundCloud();
      
        default:
          break;
      }
    
  });

}



function sendCreatePostRequest(mediaURL) {

  let request = new XMLHttpRequest();
  let method = POST;

  mediaURL = mediaURL == undefined ? "" : mediaURL;

  let api = '/api/users/' + userId + '/posts';

  let data = {
    private: privatePost,
    content: textarea.value.trim(),
    mediaURL : mediaURL
  };

  if (globalBandId != undefined)
    data.bandId = globalBandId;

  sendAsyncAjaxRequest(request, api, method, handleCreatePostAPIResponse.bind(this, request), JSON_ENCODE, JSON.stringify(data));

}


function handleCreatePostAPIResponse(response) {

  if (response.status != 200)
    return;

  textarea.style.height = '30px';
  textarea.value = "";
  inputSoundCloud.value = "";

  let tempDiv = document.createElement('div');
  tempDiv.innerHTML = response.responseText;

  let newPost = tempDiv.children[0];
  addPostListeners(newPost);

  if (lockButton != undefined) {
    lockButton.selfShow();
    unlockButton.selfHide();
  }

  postList.insertBefore(newPost, postList.children[0]);

  let mediaElement = newPost.querySelector('iframe');


}

function requestDeletePost(postId, userId, post) {

  let request = new XMLHttpRequest();
  let method = DELETE;
  let api = '/api/users/' + userId + '/posts/' + postId;

  sendAsyncAjaxRequest(request, api, method, handleDeletePostAPIResponse.bind(this, request, post));

}

function handleDeletePostAPIResponse(request, post) {

  if (request.status != 200)
    return;

  postList.removeChild(post);


}

let posts = document.querySelectorAll('.post');

for (let i = 1; i < posts.length; i++) {
  addPostListeners(posts[i]);
}

function addPostListeners(post) {

  let editPostButton = post.querySelector('.edit_post_button');
  let postText = post.querySelector('.text');
  let postTextParent = postText.parentElement;
  let cancelButton = post.querySelector('.cancel_edit_post_button');
  let confirmButton = post.querySelector('.confirm_edit_post_button');
  let editElement = post.querySelector('.editPostTextArea');

  let postId = post.querySelector('.postID').innerHTML;

  let deletePostBtn = post.querySelector('.delete_post_button');

  let newCommentTextArea = post.querySelector('.new_comment_ta');
  let newCommentButton = post.querySelector('form > input[type=submit]');

  newCommentTextArea.addEventListener('input', function () {
    newCommentButton.disabled = newCommentTextArea.value.trim().length == 0;
  })

  newCommentButton.addEventListener('click', sendNewCommentRequest.bind(this, postId, newCommentTextArea, post));


  if (editPostButton != null) {

    cancelButton.addEventListener('click', toggleProfileField.bind(this, false, postText, editElement, postTextParent, editPostButton, cancelButton, confirmButton, undefined, undefined, undefined));
    editPostButton.addEventListener('click', toggleProfileField.bind(this, true, postText, editElement, postTextParent, editPostButton, cancelButton, confirmButton, undefined, undefined, undefined));
    confirmButton.addEventListener('click', requestEditPost.bind(this, postId, editElement, postText, postTextParent, editPostButton, cancelButton, confirmButton));
    deletePostBtn.addEventListener('click', requestDeletePost.bind(this, postId, userId, post));

  }


  let commentsDivs = post.querySelectorAll('div.comment');

  for (let i = 0; i < commentsDivs.length; i++) {

    addCommentListeners(commentsDivs[i], post);

  }

}

function addCommentListeners(commentDiv, postDiv) {

  let deleteButton = commentDiv.querySelector('span.delete_comment_button');

  if (deleteButton != null)

    deleteButton.addEventListener('click', sendDeleteCommentRequest.bind(this, commentDiv, postDiv));


}

function sendDeleteCommentRequest(commentDiv, postDiv) {

  let commentId = parseInt(commentDiv.querySelector('p.commentId').innerHTML);
  let api = '/api/comments/' + commentId;

  let request = new XMLHttpRequest();

  sendAsyncAjaxRequest(request, api, DELETE, deleteCommentRequestHandler.bind(request, commentDiv, postDiv));

}

function deleteCommentRequestHandler(commentDiv, postDiv) {

  if (this.status != 200)
    return;

  postDiv.querySelector('div.comments_list').removeChild(commentDiv);

}

function sendNewCommentRequest(postId, commentTextArea, postDiv, event) {

  event.preventDefault();


  let request = new XMLHttpRequest();
  let api = '/api/posts/' + postId + '/comments';
  let data = { commentText: commentTextArea.value.trim() }


  sendAsyncAjaxRequest(request, api, POST, createCommentRequestHandler.bind(request, postDiv, commentTextArea), JSON_ENCODE, JSON.stringify(data));

}

function createCommentRequestHandler(postDiv, newCommentTextArea) {

  if (this.status != 200)
    return;

  let commentPartial = this.responseText;
  let newCommentDiv = createElementFromHTML(commentPartial);

  addCommentListeners(newCommentDiv, postDiv);

  let commentList = postDiv.querySelector('div.comments_list');

  commentList.appendChild(newCommentDiv);
  newCommentTextArea.value = "";


}

function requestEditPost(postId, textArea, postText, postTextParent, editPostButton, cancelButton, confirmButton) {

  let request = new XMLHttpRequest();
  let api = '/api/users/' + userId + '/posts/' + postId;

  let data = {
    text: textArea.value
  };

  let handler = handleEditPostAPIResponse.bind(this, request, postText, textArea, postTextParent, editPostButton, cancelButton, confirmButton);

  sendAsyncAjaxRequest(request, api, PUT, handler, JSON_ENCODE, JSON.stringify(data));

}



function handleEditPostAPIResponse(request, postText, textArea, postTextParent, editPostButton, cancelButton, confirmButton) {
  if (request.status != 200)
    return;

  let data = JSON.parse(request.responseText);


  toggleProfileField(false, postText, textArea, postTextParent, editPostButton, cancelButton, confirmButton, undefined, textArea.value, undefined);

}


let globalOffset = 1;

const NUMBER_OF_POSTS_IN_REQUEST = 5;
let globalBand = document.querySelector('p#bandId');

let globalBandId;

if (globalBand != null)

  globalBandId = globalBand.innerHTML;


function getPosts() {

  let type = document.querySelector('p#posts_page_type').innerHTML;
  let api = (type == 'band') ? '/api/bands/' + globalBandId + '/posts' : '/api/users/' + userId + '/posts';

  let request = new XMLHttpRequest();
  let data = { offset: globalOffset++ * 5, type: type }

  sendAsyncAjaxRequest(request, api, GET, getPostsAjaxRequestListener, URL_ENCODE, data);

}

function getPostsAjaxRequestListener() {

  if (this.status != 200)
    return;

  let data = JSON.parse(this.responseText);
  let postsList = document.querySelector('div#posts');

  let tempDiv = document.createElement('div');

  tempDiv.innerHTML = data.postViews;

  let newPosts = tempDiv.querySelectorAll('.post');

  for (let i = 1; i < newPosts.length; i++) {
    addPostListeners(newPosts[i]);
    postsList.appendChild(newPosts[i]);
  }


  window.scrollBy(0, 300);
  window.addEventListener('scroll', sendPostRequest);




}

window.addEventListener('scroll', sendPostRequest);

function sendPostRequest() {

  if (isBottomOfPage() == true) {
    window.removeEventListener('scroll', sendPostRequest);
    getPosts();
  }

}


//MEDIA POSTS

let NO_MEDIA = 0;
let MEDIA_PIC = 1;
let MEDIA_VIDEO = 2;
let MEDIA_SOUND = 3;

let currentMedia = NO_MEDIA;
let mediaURL = "";

let inputSoundCloud = document.querySelector('input#soundCloudLink');

function sendCreatePostRequestWithSoundCloud() {


  let data = {
    "format": "json",
    "url": inputSoundCloud.value.trim()
  }
  
  let SOUND_CLOUD_API = 'http://soundcloud.com/oembed';
  let request = new XMLHttpRequest();
  
  request.open("post",SOUND_CLOUD_API,true);
  request.setRequestHeader('Content-Type', 'application/json');
  request.send(JSON.stringify(data));
  request.addEventListener('load',receiveSoundCloudResponse);


}

function receiveSoundCloudResponse() {

  if(this.status != 200)
    return;

  let response = JSON.parse(this.responseText);

  let element = createElementFromHTML(response.html);

  mediaURL = element.getAttribute('src');

  sendCreatePostRequest(mediaURL);

}

let soundCloudButton = document.querySelector('button#soundCloudButton');

soundCloudButton.addEventListener('click', function() {

  if(currentMedia == MEDIA_SOUND) {

    soundCloudButton.classList.remove('border-dark','border');
    currentMedia = NO_MEDIA;
  }
  else {
    soundCloudButton.classList.add('border-dark','border');
    currentMedia = MEDIA_SOUND;
  }


});