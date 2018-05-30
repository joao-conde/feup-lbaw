'use strict';

let inputUsers = document.querySelector("#content input#band_members");
let dropdownUsers = document.querySelector("#content div#new_members");
let selectUsers = document.querySelector("select#selectNewMember");

let inputGenres = document.querySelector("#content input#genres");
let dropdownGenres = document.querySelector("#content div#new_genres");
let selectGenres = document.querySelector("select#selectNewGenre");

let buttonPicture = document.querySelector("#btnBandPic");
let inputPicture = document.querySelector("#band_img_input");
let imgPicture = document.querySelector("#band_img");

buttonPicture.addEventListener("click", function(){
    inputPicture.click();
});
inputPicture.addEventListener("change", function(){
    imgPicture.selfShow();
    imgPicture.setAttribute("src", URL.createObjectURL(inputPicture.files[0]));
});
let usersObj = {listElements:  document.createElement("div"), currentFocus: -1};
usersObj.listElements.setAttribute("class", "autocomplete-items");



inputUsers.parentNode.appendChild(usersObj.listElements);


inputUsers.addEventListener("keydown", listNavigation.bind(this, usersObj));

function sendRequestFindUsers(pattern) {

    let requestData = { pattern: pattern };

    let api = '/api/user_following';

    let listOfFollowingUsers = new XMLHttpRequest();
    sendAsyncAjaxRequest(listOfFollowingUsers, api, GET, requestPatternHandler.bind(listOfFollowingUsers, usersObj, '/bands/new_member'), URL_ENCODE, requestData);

}


inputUsers.addEventListener('keyup', function (e) {
    if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 13) {
        return;
    }

    let pattern = inputUsers.value;
    sendRequestFindUsers(pattern);
});


function requestPatternHandler(obj, api) {

    let followingUsers = JSON.parse(this.responseText);
    obj.listElements.innerHTML = "";
    let alreadyAddedUsers = document.querySelectorAll(".new_member_id");

    for (let i = 0; i < followingUsers.length; i++) {
        for (let j = 0; j < alreadyAddedUsers.length; j++) {
            if(followingUsers[i].id == alreadyAddedUsers[j].innerHTML){
                followingUsers.splice(i, 1);
                i--;
                break;
            }
        }
        
    }

    
    for (let i = 0; i < followingUsers.length; i++) {

        let dropdownElement = document.createElement("div");
        
        dropdownElement.innerHTML += "<span id=name>" + followingUsers[i].name + "</span>";
        dropdownElement.innerHTML += "<span id=id class=d-none>" + followingUsers[i].id + "</span>";

        dropdownElement.addEventListener("click", function (e) {
            
            inputUsers.value = "";
            obj.listElements.innerHTML = "";
            obj.currentFocus = -1;

            let requestData = { id: dropdownElement.querySelector("#id").innerHTML,
                                name: dropdownElement.querySelector("#name").innerHTML };

            let requestPartial = new XMLHttpRequest();
            sendAsyncAjaxRequest(requestPartial, api, GET, function () {
                let userChoosed = createElementFromHTML(this.responseText);
                dropdownUsers.appendChild(userChoosed);
            }, URL_ENCODE, requestData);

            let option = document.createElement('option');
            option.setAttribute('value',dropdownElement.querySelector("#id").innerHTML);
            option.setAttribute('selected','true');
            selectUsers.appendChild(option);

        });
        obj.listElements.appendChild(dropdownElement);
    }

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
