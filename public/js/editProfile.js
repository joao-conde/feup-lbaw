let userId = document.querySelector('span#user_id_span').innerHTML;

let editNameButton = document.querySelector('span#edit_name_button');
let confirmNameButton = document.querySelector('span#confirm_edit_name_button');
let cancelNameButton = document.querySelector('span#cancel_edit_name_button');

let usernameh3 = document.querySelector('h3#h3userName');
let parent = usernameh3.parentElement;

let nameInput = document.createElement('input');
nameInput.setAttribute('type', 'text');

let editBioButton = document.querySelector('span#edit_bio_button');
let confirmBioButton = document.querySelector('span#confirm_edit_bio_button');
let cancelBioButton = document.querySelector('span#cancel_edit_bio_button');

let bioPara = document.querySelector('p#bioParagraph');
let parentBio = bioPara.parentElement;

let bioTextArea = document.createElement('textarea');

if (editNameButton != null) {

    editNameButton.addEventListener('click', toggleProfileField.bind(this, true, usernameh3, nameInput, parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField));
    cancelNameButton.addEventListener('click', toggleProfileField.bind(this, false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField, undefined));
    confirmNameButton.addEventListener('click', confirmEditName);

    editBioButton.addEventListener('click', toggleProfileField.bind(this, true, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField));
    cancelBioButton.addEventListener('click', toggleProfileField.bind(this, false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField, undefined));
    confirmBioButton.addEventListener('click', confirmEditBio);


}

function keyUpAuxNameField(event) {


    if (event.keyCode == 13) {

        confirmEditName();
    }
    else if (event.keyCode == 27) {

        toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField, undefined);
      
    }

}

function keyUpAuxBioField(event) {


    if (event.keyCode == 13) {

        confirmEditBio();
    }
    else if (event.keyCode == 27) {

        toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField, undefined);
      
    }

}

function confirmEditName() {

    let data = {
        name: nameInput.value.trim()
    }

    let request = new XMLHttpRequest;
    let api = '/api/users/' + userId;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'name', data.name), JSON_ENCODE, JSON.stringify(data));

}

function confirmEditBio() {

    let data = {
        bio: bioTextArea.value.trim()
    }

    let request = new XMLHttpRequest;
    let api = '/api/users/' + userId;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'bio', data.bio), JSON_ENCODE, JSON.stringify(data));

}

function updateProfile(key, value) {

    if (this.status == 200) {

        if(key == 'name')
            toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField, value);
        else if(key == 'bio')
            toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField, value);

    }

}


/**
 * Change picture
 */


let inputPicture = document.querySelector('input#inputPicture');
let buttonPicture = document.querySelector('button#buttonPicture');

buttonPicture.addEventListener('click',selectPicture);

function selectPicture() {

    inputPicture.click();

}


