'use strict';

let button = document.querySelector('#add_button');

let genre_name = document.querySelector('input#new_genre');

let genres_list = document.querySelector('#genres_list');

console.log(genres_list);

button.addEventListener('click',function(event){
	
	event.preventDefault();

	let request = new XMLHttpRequest();

	let method = POST;
	let api = '/api/genres';

	let data = {
		genre:	genre_name.value
	};
	
    let requestData = encodeForAjax(data);
			  
    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(genre_name.value,request),data);
})


function handleAPIResponse(request) {
    if(request.status == 200) {
		let new_genre = document.createElement('li');
		new_genre.classList.add('list-group-item');		
		new_genre.innerHTML = this;

		let last = genres_list.children[genres_list.children.length-1];

		genres_list.insertBefore(new_genre,last);
		genre_name.value = '';

    }
}
