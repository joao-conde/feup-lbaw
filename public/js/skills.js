'use strict';

let add_button = document.querySelector('#add_button');

let skill_name = document.querySelector('input#new_skill');

let skills_list = document.querySelector('#skills_list');

console.log(skills_list);

/** CREATE **/

add_button.addEventListener('click',function(event){
	
	event.preventDefault();

	let request = new XMLHttpRequest();

	let method = POST;
	let api = '/api/skills';

	let data = {
		skill:	skill_name.value
	};
	
    let requestData = encodeForAjax(data);
			  
    sendAsyncAjaxRequest(request,api,method,handleCreateAPIResponse.bind(skill_name.value,request),data);
})


function handleCreateAPIResponse(request) {
    if(request.status == 200) {
		let new_skill = document.createElement('li');
		new_skill.classList.add('list-group-item');
		let skill_id = document.createElement('span');
		skill_id.classList.add('d-none');
		skill_id.innerHTML = request.responseText;
		let last = skills_list.children[skills_list.children.length-1];
		new_skill.innerHTML = this;
		new_skill.appendChild(skill_id);


		skills_list.insertBefore(new_skill,last);
		skill_name.value = '';

    }
}


/** delete **/
let skill_lines = document.querySelectorAll('.skills');

for(let line in skill_lines){
	if(line == skill_lines.length-1)
		break;

	let dbutton = skill_lines[line].querySelector('.clickable');

	dbutton.addEventListener('click', function(event) {
		event.preventDefault();
		console.log("button click");

		let request = new XMLHttpRequest();

		let skill_id = skill_lines[line].children[0];
		let method = PUT;
		let api = '/api/skills/' + skill_id.innerHTML;

		console.log(skill_id);

		let data = {
			id: skill_id.innerHTML
		};

		let requestData = encodeForAjax(data);
			  
    	sendAsyncAjaxRequest(request,api,method,handleDeleteAPIResponse.bind(skill_lines[line],request),data);

	})
}


function handleDeleteAPIResponse(request) {

    if(request.status == 200) {
		this.parentNode.removeChild(this);
    }
}
