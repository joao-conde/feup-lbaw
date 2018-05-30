'use strict';

let bandId = document.querySelector('#bandId').innerHTML;

let inputUsers = document.querySelector("input#band_members");
let usersObj = {listElements:  document.createElement("div"), currentFocus: -1};
usersObj.listElements.setAttribute("class", "autocomplete-items");

inputUsers.parentNode.appendChild(usersObj.listElements);

inputUsers.addEventListener('keyup', function (e) {
    if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 13) {
        return;
    }

    let pattern = inputUsers.value;
    sendRequestFindUsers(pattern);
});

inputUsers.addEventListener("keydown", listNavigation.bind(this, usersObj));


function sendRequestFindUsers(pattern) {

    let requestData = { pattern: pattern };

    let api = '/api/user_following';

    let listOfFollowingUsers = new XMLHttpRequest();
    sendAsyncAjaxRequest(listOfFollowingUsers, api, GET, requestPatternHandler.bind(listOfFollowingUsers, usersObj, '/bands/new_member'), URL_ENCODE, requestData);

}

function requestPatternHandler(obj, api) {

    let followingUsers = JSON.parse(this.responseText);
    obj.listElements.innerHTML = "";
    
    for (let i = 0; i < followingUsers.length; i++) {

        let dropdownElement = document.createElement("div");
        
        dropdownElement.innerHTML += "<span id=name>" + followingUsers[i].name + "</span>";
        dropdownElement.innerHTML += "<span id=id class=d-none>" + followingUsers[i].id + "</span>";

        dropdownElement.addEventListener("click", function (e) {
            
            inputUsers.value = "";
            obj.listElements.innerHTML = "";
            obj.currentFocus = -1;

            addMember(bandId, dropdownElement.querySelector("#id").innerHTML);

        });
        obj.listElements.appendChild(dropdownElement);
    }

}


function addMember(bandId, userId) {
    
    let request = new XMLHttpRequest();
    let method = PUT;
    let api = '/api/bands/' + bandId + '/invitations/' + userId;

    sendAsyncAjaxRequest(request, api, method, handleInviteMemberAPIResponse.bind(this, request, "put"));
}


function handleInviteMemberAPIResponse(response){

    if (response.status != 200)
        return;

    let data = JSON.parse(response.responseText);
    buildPendingMemberItem(data);
    
} 

function buildPendingMemberItem(data){
    let members = document.querySelector('#members');

    let member = document.createElement('div');
    member.classList.add("d-block");

    let img = document.createElement('img');
    img.classList.add("profile_img_feed");
    img.src = data.picPath;

    member.appendChild(img);

    let link = document.createElement('a');
    member.href = "/users/" + data.userId;    

    let small = document.createElement('small');
    small.classList.add("text-primary");
    small.innerHTML = data.name;

    link.appendChild(small);
    member.appendChild(link);

    let status = document.createElement('small');
    status.classList.add("ml-1");
    status.innerHTML = "p";

    member.appendChild(status);

    let removeInvBtn = document.createElement('span');
    removeInvBtn.classList.add("col-2", "clickable", "remove_invite_button");

    member.appendChild(removeInvBtn);

    let hiddenUserId = document.createElement('span');
    hiddenUserId.classList.add("d-none");
    hiddenUserId.id = "userId";
    hiddenUserId.innerHTML = data.userId;

    removeInvBtn.appendChild(hiddenUserId);

    let removeIcon = document.createElement('i');
    removeIcon.classList.add("fas", "fa-times", "text-danger");

    removeInvBtn.appendChild(removeIcon);    
    removeInvBtn.addEventListener('click', removeInviteAPI.bind(removeInvBtn, data.userId));

    members.insertBefore(member, members.childNodes[members.children.length - 1]);
}


function listNavigation(obj, e) {
    let array;
    if (obj.listElements) array = usersObj.listElements.getElementsByTagName("div");
    if (e.keyCode == 40) { // DOWN
        obj.currentFocus++;
        addActive(array, obj.currentFocus);
    } else if (e.keyCode == 38) { // UP
        obj.currentFocus--;
        addActive(array, obj.currentFocus);
    } else if (e.keyCode == 13) { // ENTER
        e.preventDefault();
        if (obj.currentFocus > -1) {
            if (array) array[obj.currentFocus].click();
        }
    }
}

function addActive(array, currentFocus) {
    if (!array) return false;

    removeActive(array);

    if (currentFocus >= array.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (array.length - 1);
    array[currentFocus].classList.add("autocomplete-active");
}

function removeActive(array) {
    for (var i = 0; i < array.length; i++) {
        array[i].classList.remove("autocomplete-active");
    }
}



//Remove band member
let removeMemberBtns = document.querySelectorAll('.remove_member_button');

for(let i = 0; i < removeMemberBtns.length; i++) {
    let memberId = removeMemberBtns[i].querySelector('#memberId').innerHTML;
    removeMemberBtns[i].addEventListener('click', removeMemberAPI.bind(removeMemberBtns[i], memberId));
}

function removeMemberAPI(memberId){
    let request = new XMLHttpRequest();
    let method = DELETE;
    let api = '/api/band_membership/' + bandId + '/' + memberId + '/inactive';

    sendAsyncAjaxRequest(request, api, method, handleDeleteMemberFromListAPIResponse.bind(this, request, "delete"));
}

//Remove band invite
let removeInviteBtns = document.querySelectorAll('.remove_invite_button');

for(let i = 0; i < removeInviteBtns.length; i++) {
    let userId = removeInviteBtns[i].querySelector('#userId').innerHTML;
    removeInviteBtns[i].addEventListener('click', removeInviteAPI.bind(removeInviteBtns[i], userId));
}

function removeInviteAPI(userId){
    let request = new XMLHttpRequest();
    let method = DELETE;
    let api = '/api/band_invitation/' + bandId + '/' + userId + '/inactive';
    
    sendAsyncAjaxRequest(request, api, method, handleDeleteMemberFromListAPIResponse.bind(this, request, "delete"));
}

function handleDeleteMemberFromListAPIResponse(response){

    if (response.status != 200)
        return;

    let member = this.parentNode.parentNode;
    member.removeChild(this.parentNode);
    
}


/*******************
* SCHEDULE CONCERT *
*******************/

let scheduleButton = document.querySelector('#schedule_button');
let locationsDiv = document.querySelectorAll('div.location');
let locationField = document.querySelector('#location');
let date = document.querySelector('#date');
let description = document.querySelector('#description');
let concertLines = document.querySelectorAll('.concert_line');

if(scheduleButton != null)
    addScheduleListener();

function addScheduleListener(){
    scheduleButton.addEventListener('click',scheduleConcert);
}

for(let i = 0; i < locationsDiv.length; i++) {

    let cityId = parseInt(locationsDiv[i].querySelector('.cityId').innerHTML);
    let cityName = locationsDiv[i].querySelector('.cityName').innerHTML;
    let countryName = locationsDiv[i].querySelector('.countryName').innerHTML;

    locationsDiv[i].addEventListener('click',editLocation.bind(this,cityId,cityName,countryName));
}

function editLocation(cityId,cityName,countryName) {
    let data = {locationId:cityId};
    let request = new XMLHttpRequest();
    let api = '/api/bands/'+bandId+'/concertDate';
    sendAsyncAjaxRequest(request,api,POST,handleLocation.bind(request,cityName,countryName),JSON_ENCODE,JSON.stringify(data));
}

function handleLocation(cityName, countryName){
    locationField.innerHTML = cityName + ', ' + countryName;
}

function scheduleConcert(){
    event.preventDefault();

    let request = new XMLHttpRequest();

    let id = this.querySelector('.id');
    let method = POST;
    let api = '/api/bands/'+bandId+'/concerts';

    let locationNames = locationField.innerHTML.split(", ");

    let data = {
        cityName: locationNames[0],
        countryName: locationNames[1],
        date: date.value,
        description: description.value,
        bandId: bandId
    };
    sendAsyncAjaxRequest(request,api,method,handleConcertAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));
}

function handleConcertAPIResponse(request){
    if(request.status == 200){
        let child = createElementFromHTML(request.response);
        let position = document.querySelector('#scheduled_concerts');
        position.appendChild(child);
    }
}

for(let line in concertLines){
    if(!isNaN(concertLines[line]))
        break;
    let dbutton = concertLines[line].querySelector('#remove_button');
    dbutton.addEventListener('click', removeConcert.bind(concertLines[line]));
}

function removeConcert(){
    event.preventDefault();

    let request = new XMLHttpRequest();

    let concertId = this.querySelector('.concert_id');

    let method = DELETE;
    let api = '/api/bands/'+bandId+'/concerts/'+concertId.innerHTML+'/remove';

    let data = {
        bandId: bandId
    };
    sendAsyncAjaxRequest(request,api,method,handleRemoveConcertAPIResponse.bind(this,request),JSON_ENCODE,JSON.stringify(data));

}

function handleRemoveConcertAPIResponse(request){
    if(request.status == 200) {
        this.parentNode.removeChild(this);
    }
}