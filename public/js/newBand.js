'use strict';

let inputUsers = document.querySelector("#content input#band_members");
let dropdownUsers = document.querySelector("#content div#new_members");
let selectUsers = document.querySelector("select#selectNewMember");

let inputGenres = document.querySelector("#content input#genres");
let dropdownGenres = document.querySelector("#content div#new_genres");
let selectGenres = document.querySelector("select#selectNewGenre");

let usersObj = {listElements:  document.createElement("div"), currentFocus: -1};
usersObj.listElements.setAttribute("class", "autocomplete-items");

inputUsers.parentNode.appendChild(usersObj.listElements);

// let genresObj = {listElements:  document.createElement("div"), currentFocus: -1};
// genresObj.listElements.setAttribute("class", "autocomplete-items");

// inputGenres.parentNode.appendChild(genresObj.listElements);


inputUsers.addEventListener("keydown", listNavigation.bind(this, usersObj));
// inputGenres.addEventListener("keydown", listNavigation.bind(this, genresObj));

function sendRequestFindUsers(pattern) {

    let requestData = { pattern: pattern };

    let api = '/api/user_following';

    let listOfFollowingUsers = new XMLHttpRequest();
    sendAsyncAjaxRequest(listOfFollowingUsers, api, GET, requestPatternHandler.bind(listOfFollowingUsers, usersObj, '/bands/new_member'), URL_ENCODE, requestData);

}

// function sendRequestFindGenres(pattern) {

//     let requestData = { pattern: pattern };

//     let api = '/api/genres';

//     let listOfGenres = new XMLHttpRequest();
//     sendAsyncAjaxRequest(listOfGenres, api, GET, requestPatternHandler.bind(listOfGenres, genresObj, '/bands/new_genre'), URL_ENCODE, requestData);

// }

inputUsers.addEventListener('keyup', function (e) {
    if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 13) {
        return;
    }

    let pattern = inputUsers.value;
    sendRequestFindUsers(pattern);
});

// inputGenres.addEventListener('keyup', function (e) {
//     if (e.keyCode == 40 || e.keyCode == 38 || e.keyCode == 13) {
//         return;
//     }

//     let pattern = inputGenres.value;
//     sendRequestFindGenres(pattern);
// });


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

            let requestData = { id: dropdownElement.querySelector("#id").innerHTML,
                                name: dropdownElement.querySelector("#name").innerHTML };

            let requestPartial = new XMLHttpRequest();
            sendAsyncAjaxRequest(requestPartial, api, GET, function () {
                dropdownUsers.innerHTML += this.responseText;
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
    console.log(array);
    console.log(currentFocus);
    array[currentFocus].classList.add("autocomplete-active");
}

function removeActive(array) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < array.length; i++) {
        array[i].classList.remove("autocomplete-active");
    }
}
