'use strict';

let add_skill_button = document.querySelector('#add_skill_button');
let add_genre_button = document.querySelector('#add_genre_button');
let new_skill_name = document.querySelector('input#new_skill');
let new_genre_name = document.querySelector('input#new_genre');
let skills_list = document.querySelector('#skills_list');
let genres_list = document.querySelector('#genres_list');

let loggedUserId = document.querySelector('#user_id_span');

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
			skill:	new_skill_name.value
		};
		let skills = document.querySelectorAll('.skill_name');
		for(var i = 0; i < skills.length; i++){
			if(skills[i].innerHTML == new_skill_name.value){
				window.alert('That skill already exists!');
				new_skill_name.value = '';
				return 0;
			}
		}
		let requestData = encodeForAjax(data);
		sendAsyncAjaxRequest(request,api,method,handleCreateAPIResponse.bind(new_skill_name,request,"skill"),URL_ENCODE,data);
	}
	else if(this == "genre"){
		let api = '/api/genres';
		data = {
			genre:	new_genre_name.value
		};
		let genres = document.querySelectorAll('.genre_name');
		for(var i = 0; i < genres.length; i++){
			if(genres[i].innerHTML == new_genre_name.value){
				window.alert('That genre already exists!');
				new_genre_name.value = '';
				return 0;
			}
		}
		let requestData = encodeForAjax(data);
		sendAsyncAjaxRequest(request,api,method,handleCreateAPIResponse.bind(new_genre_name,request,"genre"),URL_ENCODE,data);
	}

}

function handleCreateAPIResponse(request, type) {
	if(request.status == 200) {

		let new_item = document.createElement('li');
		new_item.classList.add('list-group-item');
		new_item.classList.add('skills');

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
		new_item_name_span.classList.add('skill_name');
		new_item_name_span.innerHTML = this.value;
		div.appendChild(new_item_name_span);
		
		addDelDiv(div);
		addEditDiv(div);
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
		addLinesListeners();
	}
}

function addDelDiv(div){
	let clickable = document.createElement('div');
	clickable.classList.add('col-1');
	clickable.classList.add('clickable');
	let button = document.createElement('i');
	button.classList.add('far');
	button.classList.add('fa-times-circle');
	clickable.appendChild(button);
	div.appendChild(clickable);
}

function addEditDiv(div){
	let edit_div = document.createElement('div');
	edit_div.classList.add('col-2');
	let edit_button_span = document.createElement('span');
	edit_button_span.id = 'edit_button';
	let edit_button = document.createElement('i');
	edit_button.classList.add('fas');
	edit_button.classList.add('fa-pencil-alt');
	edit_button.classList.add('clickable');
	edit_button_span.appendChild(edit_button);
	edit_div.appendChild(edit_button_span);

	let co_edit_button_span = document.createElement('span');
	co_edit_button_span.id = 'confirm_edit_button';
	co_edit_button_span.classList.add('d-none');
	let co_edit_button = document.createElement('i');
	co_edit_button.classList.add('fas');
	co_edit_button.classList.add('fa-check');
	co_edit_button.classList.add('clickable');
	co_edit_button.classList.add('text-success');
	co_edit_button_span.appendChild(co_edit_button);
	edit_div.appendChild(co_edit_button_span);

	let ca_edit_button_span = document.createElement('span');
	ca_edit_button_span.id = 'cancel_edit_button';
	ca_edit_button_span.classList.add('d-none');
	let ca_edit_button = document.createElement('i');
	ca_edit_button.classList.add('fas');
	ca_edit_button.classList.add('fa-times');
	ca_edit_button.classList.add('clickable');
	ca_edit_button.classList.add('text-danger');
	ca_edit_button_span.appendChild(ca_edit_button);
	edit_div.appendChild(ca_edit_button_span);
		
	div.appendChild(edit_div);
}

/** delete **/

addLinesListeners();

function confirmEdit(name,nameInput,type,id,parent, edit_button, cancel_edit_button, confirm_edit_button){
	let data = {
        name: nameInput.value.trim(),
        id: id,
        loggedUserId: loggedUserId
    }

    let request = new XMLHttpRequest();
    let api = '/api/' + type + 's/' + id;

    if(type == "skill")
    	sendAsyncAjaxRequest(request, api, PUT, handleEditAPIResponse.bind(request,name,nameInput,parent, edit_button, cancel_edit_button, confirm_edit_button,nameInput.value.trim()), URL_ENCODE, data);
    else if(type == "genre")
	    sendAsyncAjaxRequest(request, api, PUT, handleEditAPIResponse.bind(request,name,nameInput,parent, edit_button, cancel_edit_button, confirm_edit_button,nameInput.value.trim()), URL_ENCODE, data);
}

function handleEditAPIResponse(name, nameInput, parent, edit_button, cancel_edit_button, confirm_edit_button, newName){
	if(this.status == 200){
		toggleProfileField(false,name, nameInput,parent, edit_button, cancel_edit_button, confirm_edit_button, undefined, newName); 
	}
	else{
		console.log(this.status);
	}
}

function editSkillListener(skill){
	let skill_name = skill.querySelector('.skill_name');
	let skill_id = skill.children[0].innerHTML;
	let parent = skill_name.parentElement;
	let nameInput = document.createElement('input');
	nameInput.setAttribute('type', 'text');
	let edit_button = skill.querySelector('#edit_button');
	let confirm_edit_button = skill.querySelector('#confirm_edit_button');
	let cancel_edit_button = skill.querySelector('#cancel_edit_button');
	edit_button.addEventListener('click', toggleProfileField.bind(this, true, skill_name, nameInput, parent, edit_button, cancel_edit_button, confirm_edit_button, undefined));
	cancel_edit_button.addEventListener('click', toggleProfileField.bind(this, false, skill_name, nameInput,parent, edit_button, cancel_edit_button, confirm_edit_button, undefined, undefined));
	confirm_edit_button.addEventListener('click', confirmEdit.bind(this,skill_name,nameInput,"skill",skill_id,parent, edit_button, cancel_edit_button, confirm_edit_button));
}

function editGenreListener(genre){
	let genre_name = genre.querySelector('.genre_name');
	let genre_id = genre.children[0].innerHTML;
	let parent = genre_name.parentElement;
	let nameInput = document.createElement('input');
	nameInput.setAttribute('type', 'text');
	let edit_button = genre.querySelector('#edit_button');
	let confirm_edit_button = genre.querySelector('#confirm_edit_button');
	let cancel_edit_button = genre.querySelector('#cancel_edit_button');
	edit_button.addEventListener('click', toggleProfileField.bind(this, true, genre_name, nameInput, parent, edit_button, cancel_edit_button, confirm_edit_button, undefined));
	cancel_edit_button.addEventListener('click', toggleProfileField.bind(this, false, genre_name, nameInput,parent, edit_button, cancel_edit_button, confirm_edit_button, undefined, undefined));
	confirm_edit_button.addEventListener('click', confirmEdit.bind(this,genre_name,nameInput,"genre",genre_id,parent, edit_button, cancel_edit_button, confirm_edit_button));	
}

function addLinesListeners(){
	let skill_lines = document.querySelectorAll('.skills');
	let genre_lines = document.querySelectorAll('.genres');
	if(skill_lines.length > 0){
		for(let line in skill_lines){
			if(!isNaN(skill_lines[line]))
				break;

			let dbutton = skill_lines[line].querySelector('div.clickable');
			dbutton.addEventListener('click', deleteButtonListener.bind(skill_lines[line],"skill"));

			editSkillListener(skill_lines[line]);
		}
	}

	if(genre_lines.length > 0){
		for(let genre in genre_lines){
			if(!isNaN(genre_lines[genre]))
				break;
			
			let dbutton = genre_lines[genre].querySelector('div.clickable');
			dbutton.addEventListener('click', deleteButtonListener.bind(genre_lines[genre],"genre"));

			editGenreListener(genre_lines[genre]);
		}
	}
}

function deleteButtonListener(type, event){
	event.preventDefault();

	let request = new XMLHttpRequest();

	let id = this.children[0];
	let method = DELETE;
	let api;

	if(type == "skill")
		api = '/api/skills/' + id.innerHTML;
	else if(type == "genre")
		api = '/api/genres/' + id.innerHTML;

	let data = {
		id: id.innerHTML
	};

	let requestData = encodeForAjax(data);

	sendAsyncAjaxRequest(request,api,method,handleDeleteAPIResponse.bind(this,request),URL_ENCODE,data);

}

function handleDeleteAPIResponse(request) {

	if(request.status == 200) {
		this.parentNode.removeChild(this);
	}
}