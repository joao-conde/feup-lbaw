let globalOffset = 1;

const NUMBER_OF_POSTS_IN_REQUEST = 5;

function getPosts() {

    let request = new XMLHttpRequest();
    let data = {offset: globalOffset++ * 5, type:'userProfile'}
    let api = '/api/user/'+ userId +'/posts'

    sendAsyncAjaxRequest(request,api,GET,getPostsAjaxRequestListener,URL_ENCODE,data);
    console.log('sending request');

}

function getPostsAjaxRequestListener() {

    if(this.status != 200)
        return;

    let postsList = document.querySelector('div#posts');

    postsList.innerHTML += this.responseText;

    window.scrollBy(0,300);
    window.addEventListener('scroll', sendPostRequest);

}

window.addEventListener('scroll', sendPostRequest);

function sendPostRequest() {

    if(isBottomOfPage() == true) {
        window.removeEventListener('scroll',sendPostRequest);
        getPosts();
    }

}