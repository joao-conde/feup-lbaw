'use strict';

//Create Post

let textarea = document.querySelector('#new_post_ta');
let postButton = document.querySelector('#postbutton');

if (textarea != null) {

  textarea.addEventListener('focus', function () {
    textarea.style.height = '150px';
    postButton.style.display = 'flex';
  })

  textarea.style.transition = "height 0.5s";

  textarea.addEventListener('focusout', function () {
    textarea.style.height = '30px';
  })
}

if (postButton != null) {

  postButton.addEventListener('click', function () {

    let request = new XMLHttpRequest();
    let method = POST;

    let api = '/api/users/' + userId + '/posts';

    let data = {
      private: false,
      content: textarea.value
    };

    sendAsyncAjaxRequest(request, api, method, handleCreatePostAPIResponse.bind(textarea, request, "post"), JSON_ENCODE, JSON.stringify(data));
    postButton.style.display = 'none';
  })

}

function handleCreatePostAPIResponse(response) {

  if (response.status != 200)
    return;

  let postList = document.querySelector('div#posts');
  postList.innerHTML = response.responseText + postList.innerHTML;
  postList.children[1].parentNode.insertBefore(postList.children[1], postList.children[0]);
  this.value = "";

  addPostButtonsEventListeners(postList.children[1]);
}

function handlerDeletePost(postId, userId) {

  let request = new XMLHttpRequest();
  let method = DELETE;
  let api = '/api/users/' + userId + '/posts/' + postId;

  let data = {
    postid: postId
  };

  sendAsyncAjaxRequest(request, api, method, handleDeletePostAPIResponse.bind(this, request, "delete"), JSON_ENCODE, JSON.stringify(data));

}



//Delete Post
let posts = document.querySelectorAll('.post');

for (let i = 1; i < posts.length; i++) {
  addPostButtonsEventListeners(posts[i]);
}

function addPostButtonsEventListeners(post) {
  console.log("ADDING LISTENERS");
  let deletePostBtn = post.querySelector('#delete_post_button');
  let editPostBtn = post.querySelector('#edit_post_button');
  let postId = post.querySelector('#postID').innerHTML;
  console.log(deletePostBtn);
  console.log(editPostBtn);
  if (deletePostBtn != null)
    deletePostBtn.addEventListener('click', handlerDeletePost.bind(this, postId, userId));

  if (editPostBtn != null)
    editPostBtn.addEventListener('click', toggleOnEditPost.bind(editPostBtn, post));

}

function handleDeletePostAPIResponse(request) {

  if (request.status != 200)
    return;

  let data = JSON.parse(request.responseText);
  let posts = document.querySelectorAll('.post');
  let postidToDelete = data.postid;

  for (let i = 1; i < posts.length; i++) {

    let postId = posts[i].querySelector('#postID').innerHTML;
    if (postId == postidToDelete) {
      posts[i].parentNode.removeChild(posts[i]);
      break;
    }

  }
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
  postsList.innerHTML += data.postViews;


  postsList = document.querySelector('div#posts');
  console.log(postsList.children.length);
  console.log(data.numberOfPosts);
  console.log(postsList);
  for (let i = 0; i < data.numberOfPosts; i++) {
    addPostButtonsEventListeners(postsList.children[postsList.children.length - 1 - i]);
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


function toggleOffEditPost(cancelBtn, verifyBtn, saveChanges) {
  console.log("EDIT TOGGLED OFF--->SAVE? " + saveChanges);
  if (saveChanges) {
    //edit post in db

  }
  else {
    //cancel changes
  }

  let btnDiv = verifyBtn.parentNode;

  //verify button to edit
  let editBtn = document.createElement('span');
  let editIcon = document.createElement('i');
  editIcon.classList.add("clickable", "fas", "fa-pencil-alt");
  editBtn.appendChild(editIcon);
  editBtn.id = "edit_post_button";
  btnDiv.replaceChild(editBtn, verifyBtn);

  //cancel button to delete
  let deleteBtn = document.createElement('span');
  let deleteIcon = document.createElement('i');
  deleteIcon.classList.add("clickable", "fas", "fa-trash-alt");
  deleteBtn.appendChild(deleteIcon);
  deleteBtn.id = "delete_post_button";
  btnDiv.replaceChild(deleteBtn, cancelBtn);

}


function toggleOnEditPost(post) {

  //swap icones
  let btnDiv = this.parentNode;
  let verifyBtn = document.createElement('span');
  let verifyIcon = document.createElement('i');
  verifyIcon.classList.add("clickable", "fas", "fa-check", "text-success");
  verifyBtn.appendChild(verifyIcon);
  verifyBtn.id = "verify_button";
  btnDiv.replaceChild(verifyBtn, this);

  let cancelBtn = document.createElement('span');
  let cancelIcon = document.createElement('i');
  cancelIcon.classList.add("clickable", "fas", "fa-times", "text-danger");
  cancelBtn.appendChild(cancelIcon);
  cancelBtn.id = "cancel_button";
  btnDiv.replaceChild(cancelBtn, btnDiv.querySelector('#delete_post_button'));

  verifyBtn.addEventListener('click', toggleOffEditPost.bind(this, cancelBtn, verifyBtn, true));
  cancelBtn.addEventListener('click', toggleOffEditPost.bind(this, cancelBtn, verifyBtn, false));

  //replace comment for textarea but leave old text as placeholder
  let editTextArea = document.createElement('textarea');
  let postText = post.querySelector('#text');
  editTextArea.classList.add("col-9", "col-sm-10", "col-md-9", "col-lg-10", "text-primary", "form-control-sm", "border", "border-secondary");
  editTextArea.style = "resize: none;";
  editTextArea.placeholder = postText.innerHTML;
  postText.parentNode.replaceChild(editTextArea, postText);

}


function handlerEditPost(postId, userId) {
  console.log("AJAX EDIT POSTID " + postId);
  //change api, route, data...
  let request = new XMLHttpRequest();
  let method = POST;
  let api = '/api/users/' + userId + '/posts/' + postId;

  let data = {
    postid: postId
  };

  sendAsyncAjaxRequest(request, api, method, handleEditPostAPIResponse.bind(this, request, "post"), JSON_ENCODE, JSON.stringify(data));

}


function handleEditPostAPIResponse(request) {
  console.log(request);
  if (request.status != 200)
    return;

  let data = JSON.parse(request.responseText);

  console.log("EDIT API RESPONSE " + data.text);
}