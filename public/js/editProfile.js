/**
 *   Lock && Unlock
 */ 

let editFields = document.querySelectorAll('.edit_field');
let lockLocked = document.querySelector('span#lock_locked');
let lockOpened = document.querySelector('span#lock_opened');

let submitPasswordButton = document.querySelector('button#submit_password');
let passwordField = document.querySelector('input#verify_password');

let wrongPwd = document.querySelector('div#modal-msg');
let emptyPwd = document.querySelector('div#modal-msg-empty');

let closeModalBtn = document.querySelector('button#close_button');

lockLocked.addEventListener('click',openModalHandler);
submitPasswordButton.addEventListener('click',verifyPassword);
closeModalBtn.addEventListener('click',closeModalHandler);
lockOpened.addEventListener('click',lock);

function toggleEdits(show) {

    for(let i = 0; i < editFields.length; i++) {

        !show ? editFields[i].selfHide() : editFields[i].selfShow();

    }

}

function lock() {

    toggleEdits(false);

    lockLocked.selfShow();
    lockOpened.selfHide();


}

function open() {

    toggleEdits(true);

    lockOpened.selfShow()
    lockLocked.selfHide();

}

function verifyPassword() {

    let data = {
        pwd: passwordField.value
    }

    if(data.pwd == '') {
        showEmptyError();
        return;
    }
        

    let api = '/api/users/' + userId + '/verify_pwd';

    let requestPasswordVerification = new XMLHttpRequest();
    sendAsyncAjaxRequest(requestPasswordVerification,api,POST,passwordValidationHandler,JSON_ENCODE,JSON.stringify(data));


}   

function passwordValidationHandler() {

    if(this.status == 200) {

        closeModalBtn.click();
        wrongPwd.selfHide();
        passwordField.value = '';

        open();

    }

    else {

        showWrongPwdError();
        passwordField.value = '';
        
    }

}

function cleanModalErrorMessages() {

    wrongPwd.selfHide();
    emptyPwd.selfHide();
    passwordField.value='';
    
}

function closeModalHandler() {
    window.removeEventListener('keyup',confirmVerifyPasswordKeyListener);
}

function openModalHandler() {
    window.addEventListener('keyup',confirmVerifyPasswordKeyListener);
    cleanModalErrorMessages();
}

function showEmptyError() {
    emptyPwd.selfShow();
    wrongPwd.selfHide();
}

function showWrongPwdError() {
    emptyPwd.selfHide();
    wrongPwd.selfShow();
}

function confirmVerifyPasswordKeyListener(event) {

    if (event.keyCode == 13) {

        verifyPassword();

        
    }
    else if (event.keyCode == 27) {

        closeModalBtn.click();        

    }

}


/**
 * Profile edition
 */



let userId = document.querySelector('span#user_id_span').innerHTML;
let api = '/api/users/' + userId;

let editNameButton = document.querySelector('span#edit_name_button');
let confirmNameButton = document.querySelector('span#confirm_edit_name_button');
let cancelNameButton = document.querySelector('span#cancel_edit_name_button');

let usernameh3 = document.querySelector('h3#h3userName');
let parent = usernameh3.parentElement;

let nameInput = document.createElement('input');
nameInput.setAttribute('type', 'text');

let editNameAid = document.querySelector('#edit_name_aid');
let editBioAid = document.querySelector('#edit_bio_aid');

let editBioButton = document.querySelector('span#edit_bio_button');
let confirmBioButton = document.querySelector('span#confirm_edit_bio_button');
let cancelBioButton = document.querySelector('span#cancel_edit_bio_button');

let bioPara = document.querySelector('p#bioParagraph');
let parentBio = bioPara.parentElement;

let bioTextArea = document.createElement('textarea');

let parentDateFields = document.querySelector('li#date_parent');
let editDateButton = document.querySelector('span#edit_date_button');
let confirmDateButton = document.querySelector('span#confirm_edit_date_button');
let cancelDateButton = document.querySelector('span#cancel_edit_date_button');
let editDateAid = document.querySelector('#edit_date_aid');

let dateField = document.querySelector('small#date_field');
let dateInput = document.querySelector('input#date_input');


if (editNameButton != null) {

    editNameButton.addEventListener('click',editName);
    cancelNameButton.addEventListener('click',cancelEditName);
    confirmNameButton.addEventListener('click', confirmEditName);

    editBioButton.addEventListener('click',editBio);
    cancelBioButton.addEventListener('click',cancelEditBio);
    confirmBioButton.addEventListener('click', confirmEditBio);

    // editDateButton.addEventListener('click',editField);
    editDateButton.addEventListener('click',editField.bind(this,dateField,dateInput,parentDateFields,editDateButton,cancelDateButton,confirmDateButton,keyUpAuxDateField,editDateAid));
    cancelDateButton.addEventListener('click',cancelEditBirthDate);


}

function keyUpAuxNameField(event) {


    if (event.keyCode == 13) {

        confirmEditName();
    }
    else if (event.keyCode == 27) {

        cancelEditName();
    }

}

function keyUpAuxBioField(event) {


    if (event.keyCode == 13) {

        confirmEditBio();
    }
    else if (event.keyCode == 27) {

        cancelEditBio();
    }

}

function keyUpAuxDateField(event) {


    if (event.keyCode == 13) {

        //confirmEditBio();
    }
    else if (event.keyCode == 27) {

        //cancelEditBio();
    }

}

function confirmEditName() {

    let data = {
        name: nameInput.value.trim()
    }

    let request = new XMLHttpRequest;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'name', data.name), JSON_ENCODE, JSON.stringify(data));

}

function editName() {

    toggleProfileField(true, usernameh3, nameInput, parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField);
    editNameAid.selfHide();

}

function cancelEditName() {

    toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField, undefined);
    editNameAid.selfShow();
}

function acknowledgeEditName(value) {
    toggleProfileField(false, usernameh3, nameInput,parent, editNameButton, cancelNameButton, confirmNameButton, keyUpAuxNameField, value);
    editNameAid.selfShow();
}

function confirmEditBio() {

    let data = {
        bio: bioTextArea.value.trim()
    }

    let request = new XMLHttpRequest;

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'bio', data.bio), JSON_ENCODE, JSON.stringify(data));

}

function editBio() {

    toggleProfileField(true, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField);
    editBioAid.selfHide();

}

function cancelEditBio() {

    toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField, undefined);
    editBioAid.selfShow();

}

function acknowledgeEditBio(value) {
    toggleProfileField(false, bioPara, bioTextArea, parentBio, editBioButton, cancelBioButton, confirmBioButton, keyUpAuxBioField, value);
    editBioAid.selfShow();
}

function editBirthDate() {

    toggleProfileField(true, dateField, dateInput, parentDateFields, editDateButton, cancelDateButton, confirmDateButton, keyUpAuxDateField);
    editDateAid.selfHide();
}

function cancelEditBirthDate() {
    toggleProfileField(false, dateField, dateInput, parentDateFields, editDateButton, cancelDateButton, confirmDateButton, keyUpAuxDateField, undefined);
    editBioAid.selfShow();
}

function editField(fixedField,editField,parentField,editButton,cancelButton,confirmButton,keysListener,aidElement,event) {

    toggleProfileField(true, fixedField, editField, parentField, editButton, cancelButton, confirmButton, keysListener);
    aidElement.selfHide();

}



function updateProfile(key, value) {

    if (this.status == 200) {

        if(key == 'name') {
            acknowledgeEditName(value);
        }
        else if(key == 'bio') {
            acknowledgeEditBio(value);
        }

    }

}


/**
 * Change picture
 */


let inputPicture = document.querySelector('input#inputPicture');
let buttonPicture = document.querySelector('button#buttonPicture');
let profilePicture = document.querySelector('img#profile_pic');
let iconPicture = document.querySelector('img#icon_profile_image');

buttonPicture.addEventListener('click',selectPicture);
inputPicture.addEventListener('change',sendPicture);


function selectPicture() {

    inputPicture.click();
    
}

function sendPicture(e) {

    let files = inputPicture.files;

    if(!files.length > 0)
        return;

    let file = files[0];

    if(file.type == 'image/jpeg' || file.type == 'image/gif' || file.type == 'image/png'){
        
        
        let request = new XMLHttpRequest();

        let form = new FormData();
        form.append('picture',file);

        sendAsyncAjaxRequest(request,api,POST,handleUpdatePicture.bind(request,file),undefined,form);
        
    }

}

function handleUpdatePicture(file) {

    if(this.status == 200) {

        profilePicture.src = URL.createObjectURL(file);
        iconPicture.src = URL.createObjectURL(file);

    }
        

}


