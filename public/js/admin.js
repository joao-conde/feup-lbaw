/*************
* Pagination *
*************/

let previousButton = document.querySelector('#previous_button');
let nextButton = document.querySelector('#next_button');
let currentPage = document.querySelector('#current_page');
let lastPage = document.querySelector('#last_page');

if(previousButton != null && nextButton != null)
	togglePreviousAndNextButtons();

function togglePreviousAndNextButtons(){
	if(currentPage.innerHTML != 1){
		if(previousButton.classList.contains('disabled')){
			previousButton.classList.remove('disabled');
		}
	}
	else{
		if(!previousButton.classList.contains('disabled'))
			previousButton.classList.add('disabled');
	}

	if(currentPage.innerHTML != lastPage.innerHTML){
		if(nextButton.classList.contains('disabled'))
			nextButton.classList.remove('disabled');
	}
	else{
		if(!nextButton.classList.contains('disabled'))
			nextButton.classList.add('disabled');
	}
}

/*************
* Privileges *
*************/

let toggleInputs = document.querySelectorAll('.toggleInput');
let userLines = document.querySelectorAll('.user_line');

if(toggleInputs != null && userLines != null)
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

/************
* Ban User *
************/

let userReportsLines = document.querySelectorAll('.user_reports_line');
let bandReportsLines = document.querySelectorAll('.band_reports_line');
let userIdAdmin = document.querySelector('.user_id');
let bandId = document.querySelector('.band_id');

if(userReportsLines != null || bandReportsLines != null)
	createButtonsListeners();

function createButtonsListeners(){
	for(let idx in userReportsLines){
		if(!isNaN(userReportsLines[idx]))
			break;

		let ignoreButton = userReportsLines[idx].querySelector('#ignore_button');
		if(ignoreButton != null)
			ignoreButton.addEventListener('click',ignoreButtonListener.bind(userReportsLines[idx],'user'));
		let removeButton = userReportsLines[idx].querySelector('#remove_button');
		if(removeButton != null)
			removeButton.addEventListener('click',removeButtonListener.bind(userReportsLines[idx],'user'));
		let warnButton = userReportsLines[idx].querySelector('#warn_button');
		if(warnButton != null)
			warnButton.addEventListener('click',warnButtonListener.bind(userReportsLines[idx],'user'));
		let banButton = userReportsLines[idx].querySelector('#ban_button');
		if(banButton != null)
			banButton.addEventListener('click',banButtonListener.bind(userReportsLines[idx],'user'));
	}

	for(let idx in bandReportsLines){
		if(!isNaN(bandReportsLines[idx]))
			break;

		let ignoreButton = bandReportsLines[idx].querySelector('#ignore_button');
		if(ignoreButton != null)
			ignoreButton.addEventListener('click',ignoreButtonListener.bind(bandReportsLines[idx],'band'));
		let removeButton = bandReportsLines[idx].querySelector('#remove_button');
		if(removeButton != null)
			removeButton.addEventListener('click',removeButtonListener.bind(bandReportsLines[idx],'band'));
		let warnButton = bandReportsLines[idx].querySelector('#warn_button');
		if(warnButton != null)
			warnButton.addEventListener('click',warnButtonListener.bind(bandReportsLines[idx],'band'));
		let banButton = bandReportsLines[idx].querySelector('#ban_button');
		if(banButton != null)
			banButton.addEventListener('click',banButtonListener.bind(bandReportsLines[idx],'band'));
	}
}

function handleReportsAPIResponse(request) {
	if(request.status == 200){
		this.parentNode.removeChild(this);
	}	
}

/*********
* IGNORE *
*********/
function ignoreButtonListener(type){
	event.preventDefault();

	reportId = this.querySelector('.report_id');

	let request = new XMLHttpRequest();

	let id;
	if(type == 'user')
		id = userIdAdmin.innerHTML;
	else if(type == 'band')
		id = bandId.innerHTML;

	let method = PUT;
	let api = '/admin_api/' + type + 's/' + id + '/ignore_report';

	let data = {
		id: id,
		reportId: reportId.innerHTML
	};

	console.log(data);

	sendAsyncAjaxRequest(request,api,method,handleReportsAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}

/*********
* REMOVE *
*********/
function removeButtonListener(type){
	event.preventDefault();

	reportId = this.querySelector('.report_id');

	let request = new XMLHttpRequest();

	let id;
	if(type == 'user')
		id = userIdAdmin.innerHTML;
	else if(type == 'band')
		id = bandId.innerHTML;

	let method = PUT;
	let api = '/admin_api/' + type + 's/' + id + '/remove_content';

	let data = {
		id: id,
		reportId: reportId.innerHTML
	};

	sendAsyncAjaxRequest(request,api,method,handleReportsAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}

/*******
* WARN *
*******/
function warnButtonListener(type){
	event.preventDefault();

	reportId = this.querySelector('.report_id');

	let reason = prompt("Enter the reason to warn this " + type);
	if(reason == null || reason == '')
		reason = 'Cumulative reports led to warn';

	let id;
	if(type == 'user')
		id = userIdAdmin.innerHTML;
	else if(type == 'band')
		id = bandId.innerHTML;

	let request = new XMLHttpRequest();

	let method = POST;
	let api = '/admin_api/' + type + 's/' + id + '/reports/' + reportId.innerHTML + '/warns';
	let data = {
		id: id,
		reportId: reportId.innerHTML,
		reason: reason
	};

	sendAsyncAjaxRequest(request,api,method,handleReportsAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}

/******
* BAN *
******/
function banButtonListener(type){
	event.preventDefault();

	let reason = prompt("Enter the reason to ban this " + type);
	if(reason == null || reason == '')
		reason = 'Cumulative reports led to ban';

	let id;
	if(type == 'user')
		id = userIdAdmin.innerHTML;
	else if(type == 'band')
		id = bandId.innerHTML;

	reportId = this.querySelector('.report_id');

	let request = new XMLHttpRequest();

	let method = POST;
	let api = '/admin_api/' + type + 's/' + id + '/ban';

	let data = {
		id: id,
		reportId: reportId.innerHTML,
		reason: reason
	};

	sendAsyncAjaxRequest(request,api,method,handleReportsAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}

/***********
* LIFT BAN *
***********/
let bannedUserLines = document.querySelectorAll('.banned_user_line');
let bannedBandLines = document.querySelectorAll('.banned_band_line');
if(bannedUserLines != null || bannedBandLines != null)
	createLiftBanListeners();

function createLiftBanListeners(){
	for(let idx in bannedUserLines){
		if(!isNaN(bannedUserLines[idx]))
			break;

		let liftBanButton = bannedUserLines[idx].querySelector('#lift_ban_button');
		liftBanButton.addEventListener('click',liftBanButtonListener.bind(bannedUserLines[idx],'user'));
	}
	for(let idx in bannedBandLines){
		if(!isNaN(bannedBandLines[idx]))
			break;

		let liftBanButton = bannedBandLines[idx].querySelector('#lift_ban_button');
		liftBanButton.addEventListener('click',liftBanButtonListener.bind(bannedBandLines[idx],'band'));
	}
}

function liftBanButtonListener(type){
	event.preventDefault();

	banId = this.querySelector('.ban_id');

	let id;
	if(type == 'user')
		id = userIdAdmin.innerHTML;
	else if(type == 'band')
		id = bandId.innerHTML;

	let request = new XMLHttpRequest();

	let method = PUT;
	let api = '/admin_api/' + type + 's/' + id + '/lift_ban';

	let data = {
		banId: banId.innerHTML
	};

	sendAsyncAjaxRequest(request,api,method,handleReportsAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}