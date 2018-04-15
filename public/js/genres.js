let button = document.querySelector('#add_button');
let genre_name = document.querySelector('#new_genre');
let genres_list = document.querySelector('#genres_list');

button.addEventListener('click',function(event){

	event.preventDefault();
	let new_genre = document.createElement('li');

	new_genre.innerHtml = '<li class="list-group-item">${genre_name}</li>';
	console.log(new_genre);

	let request = new XMLHttpRequest();




})