'use strict';

let button = document.querySelector('#add_button');
let genre_name = document.querySelector('#new_genre');
let genres_list = document.querySelector('#genres_list');

button.addEventListener('click',function(event){
	
	event.preventDefault();

	let request = new XMLHttpRequest();

	let method = POST;
    let api = '/api/genres/';

    let data = encodeForAjax(genre_name.getAttribute('value'));
              
    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(genre_name,request),data);
})


function handleAPIResponse(request) {
    if(request.status == 200) {
		let new_genre = document.createElement('li');
    	new_genre.classList.add('list-group-item');
		new_genre.innerHtml = this;
    }
}
