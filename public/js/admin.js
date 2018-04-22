let toggleInputs = document.querySelectorAll('.toggleInput');
let userLines = document.querySelectorAll('.user_line');

createToggleListeners();

function createToggleListeners(){
	for(let idx in userLines){
		if(!isNaN(userLines[idx]))
			break;

		let toggle = userLines[idx].querySelector('.switch');
		toggle.addEventListener('click',toggleListener.bind(userLines[idx]));
	}
}

function toggleListener(){
	event.preventDefault();

	let request = new XMLHttpRequest();

	let id = this.querySelector('.id');
	let method = PUT;
	let api = '/admin_api/users/{id}'

	let data = {
		id: id.innerHTML
	};

	sendAsyncAjaxRequest(request,api,method,handleToggleAPIResponse.bind(this,request),URL_ENCODE,data);
}

function handleToggleAPIResponse(request) {

	if(request.status == 200) {
		let perms = this.querySelector('.toggleInput');
		if(perms.checked)
			perms.checked = false;
		else
			perms.checked = true;
	}
}