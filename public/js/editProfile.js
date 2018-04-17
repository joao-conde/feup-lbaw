let FIELDS = {

    NAME: 1,
    BIO: 2

}


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

    editNameButton.addEventListener('click', toggleProfileField.bind(this, true, usernameh3, nameInput, parent, editNameButton, cancelNameButton, confirmNameButton, FIELDS.NAME));
    cancelNameButton.addEventListener('click', toggleProfileField.bind(this, false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, FIELDS.NAME, undefined));
    confirmNameButton.addEventListener('click', confirmEditName);

    editBioButton.addEventListener('click', toggleProfileField.bind(this, true, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, FIELDS.BIO));
    cancelBioButton.addEventListener('click', toggleProfileField.bind(this, false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, FIELDS.BIO, undefined));
    confirmBioButton.addEventListener('click', confirmEditBio);


}

/**
 * toggle buttons to edit name
 * showEdit: boolean: true to show edit input, false to hide, undefined to cancel 
 * newValue: new value for the field, if undefined, keeps the old value
 */

function toggleProfileField(showEdit, fixedElement, editElement, parentElement, editButton, cancelButton, confirmButton, field, newValue) {

    if (showEdit == true) {

        let oldValue = fixedElement.innerHTML;
        editButton.classList.add('d-none');
        confirmButton.classList.remove('d-none');
        cancelButton.classList.remove('d-none');
        parentElement.replaceChild(editElement, fixedElement);
        editElement.value = oldValue;

        switch(field) {

            case FIELDS.NAME:
                window.addEventListener('keyup', keyUpAuxNameField);
                break;

            case FIELDS.BIO:
                window.addEventListener('keyup', keyUpAuxBioField);
                break;

        } 

    }

    else {

        console.log(cancelButton);

        editButton.classList.remove('d-none');
        confirmButton.classList.add('d-none');
        cancelButton.classList.add('d-none');

        if (newValue != undefined)
            fixedElement.innerHTML = newValue;
        parentElement.replaceChild(fixedElement, editElement);

        switch(field) {

            case FIELDS.NAME:
                window.removeEventListener('keyup', keyUpAuxNameField);
                break;

            case FIELDS.BIO:
                window.removeEventListener('keyup', keyUpAuxBioField);
                break;

        } 

    }

}

function keyUpAuxNameField(event) {


    if (event.keyCode == 13) {

        confirmEditName();
    }
    else if (event.keyCode == 27) {

        toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, FIELDS.NAME, undefined);
      
    }

}

function keyUpAuxBioField() {


    if (event.keyCode == 13) {

        confirmEditBio();
    }
    else if (event.keyCode == 27) {

        toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, FIELDS.BIO, undefined);
      
    }






}


function confirmEditName() {

    let data = {
        name: nameInput.value
    }

    let request = new XMLHttpRequest;
    let api = '/api/users/' + userId;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'name', data.name), JSON_ENCODE, JSON.stringify(data));

}

function confirmEditBio() {

    let data = {
        bio: bioTextArea.value
    }

    let request = new XMLHttpRequest;
    let api = '/api/users/' + userId;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'bio', data.bio), JSON_ENCODE, JSON.stringify(data));

}

function updateProfile(key, value) {

    if (this.status == 200) {

        if(key == 'name')
            toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, FIELDS.NAME, value);
        else if(key == 'bio')
            toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, FIELDS.BIO, value);

    }

}

