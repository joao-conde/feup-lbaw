'use strict';

let add_skill_button = document.querySelector('#add_skill_button');
let add_genre_button = document.querySelector('#add_genre_button');
let skill_name = document.querySelector('input#new_skill');
let genre_name = document.querySelector('input#new_genre');
let skills_list = document.querySelector('#skills_list');
let genres_list = document.querySelector('#genres_list');

/** CREATE **/

if(add_skill_button != null)
	add_skill_button.addEventListener('click',createButtonListener.bind("skill"));

if(add_genre_button != null)
	add_genre_button.addEventListener('click',createButtonListener.bind("genre"));


function createButtonListener(event){

	event.preventDefault();

	let request = new XMLHttpRequest();
	let method = POST;
	let data;

	if(this == "skill"){
		let api = '/api/skills';
		data = {
			skill:	skill_name.value
		};
		let requestData = encodeForAjax(data);
		sendAsyncAjaxRequest(request,api,method,handleCreateAPIResponse.bind(skill_name,request,"skill"),data);
	}
	else if(this == "genre"){
		let api = '/api/genres';
		data = {
			genre:	genre_name.value
		};
		let requestData = encodeForAjax(data);
		sendAsyncAjaxRequest(request,api,method,handleCreateAPIResponse.bind(genre_name,request,"genre"),data);
	}

}

function handleCreateAPIResponse(request, type) {
	if(request.status == 200) {

		let new_item = document.createElement('li');
		new_item.classList.add('list-group-item');

		let new_item_id = document.createElement('span');
		new_item_id.classList.add('d-none');
		if(type == "skill")
			new_item_id.id = "skill_id";
		else if(type == "genre")
			new_item_id.id = "genre_id";
		
		new_item_id.innerHTML = request.responseText;
		new_item.appendChild(new_item_id);

		let div = document.createElement('div');
		div.classList.add('row');

		let r_span = document.createElement('span');
		r_span.classList.add('col-3');
		div.appendChild(r_span);

		let new_item_name_span = document.createElement('span');
		new_item_name_span.classList.add('col-6');
		new_item_name_span.innerHTML = this.value;
		div.appendChild(new_item_name_span);
		
		let clickable = document.createElement('div');
		clickable.classList.add('col-3');
		clickable.classList.add('clickable');
		let button = document.createElement('i');
		button.classList.add('far');
		button.classList.add('fa-times-circle');
		clickable.appendChild(button);
		div.appendChild(clickable);
		new_item.appendChild(div);
		new_item.children[1].children[2].addEventListener('click', deleteButtonListener.bind(new_item,type));
		
		if(type == "skill"){
			let last = skills_list.children[skills_list.children.length-1];
			skills_list.insertBefore(new_item,last);
		}
		else if(type == "genre"){
			let last = genres_list.children[genres_list.children.length-1];
			genres_list.insertBefore(new_item,last);
		}
		
		this.value = '';
	}
}


/** delete **/
let skill_lines = document.querySelectorAll('.skills');
let genre_lines = document.querySelectorAll('.genres');

addLinesListeners();

function addLinesListeners(){
	if(skill_lines.length > 0){
		for(let line in skill_lines){
			if(line == skill_lines.length)
				break;

			let dbutton = skill_lines[line].querySelector('.clickable');
			dbutton.addEventListener('click', deleteButtonListener.bind(skill_lines[line],"skill"));
		}
	}

	if(genre_lines.length > 0){
		for(let genre in genre_lines){
			if(genre == genre_lines.length)
				break;

			let dbutton = genre_lines[genre].querySelector('.clickable');
			dbutton.addEventListener('click', deleteButtonListener.bind(genre_lines[genre],"genre"));
		}
	}
}

function deleteButtonListener(type, event){
	event.preventDefault();

	let request = new XMLHttpRequest();

	let id = this.children[0];
	let method = PUT;
	let api;

	if(type == "skill")
		api = '/api/skills/' + id.innerHTML;
	else if(type == "genre")
		api = '/api/genres/' + id.innerHTML;

	let data = {
		id: id.innerHTML
	};

	let requestData = encodeForAjax(data);

	sendAsyncAjaxRequest(request,api,method,handleDeleteAPIResponse.bind(this,request),data);

}

function handleDeleteAPIResponse(request) {

	if(request.status == 200) {
		this.parentNode.removeChild(this);
	}
}
