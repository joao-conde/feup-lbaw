'use strict';

let globalBandId = document.querySelector('p#bandId').innerHTML;
let globalOffset = 1;


const NUMBER_OF_POSTS_IN_REQUEST = 5;



function getPosts() {

    let request = new XMLHttpRequest();
    let data = {offset: globalOffset++ * 5 - 1}
    let api = '/api/bands/'+ globalBandId +'/posts'

    sendAsyncAjaxRequest(request,api,GET,getPostsAjaxRequestListener,URL_ENCODE,data);
    console.log('sending request');

}

function getPostsAjaxRequestListener() {

    if(this.status != 200)
        return;

    let posts = JSON.parse(this.responseText);

    for(let i = 0; i < posts.length; i++) {

        let d = document.createElement('div');
        d.classList.add('jumbotron');

        let p = document.createElement('p');
        p.innerHTML = posts[i].text;

        d.appendChild(p);

        document.body.appendChild(d);

    }

    window.scrollBy(0,250);

}

window.addEventListener('scroll', sendPostRequest);

function sendPostRequest() {

    if(isBottomOfPage() == true) {
        getPosts();
    }

}








