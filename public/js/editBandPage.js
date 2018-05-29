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
    buildMemberItem(data);
    
} 

function buildMemberItem(data){
    let members = document.querySelector('#members');

    let member = document.createElement('a');
    member.classList.add("d-block");
    member.href = "/users/" + data.userId;
    
    let img = document.createElement('img');
    img.classList.add("profile_img_feed");
    img.src = data.picPath; 

    let small = document.createElement('small');
    small.classList.add("text-primary");
    small.innerHTML = data.name;

    let small2 = document.createElement('small');
    small2.classList.add("ml-1");
    small2.innerHTML = "p";

    member.appendChild(img);
    member.appendChild(small);
    member.appendChild(small2);

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

    sendAsyncAjaxRequest(request, api, method, handleRemoveMemberAPIResponse.bind(this, request, "delete"));
}

function handleRemoveMemberAPIResponse(response){
    
    if (response.status != 200)
        return;

    //delete
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

    sendAsyncAjaxRequest(request, api, method, handleRemoveInviteAPIResponse.bind(this, request, "delete"));
}

function handleRemoveInviteAPIResponse(response){

    if (response.status != 200)
        return;

    //delete
}