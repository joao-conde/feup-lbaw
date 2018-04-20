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

    sendAsyncAjaxRequest(request, api, PUT, updateProfile.bind(request, 'name', data.name), JSON_ENCODE, JSON.stringify(data));

}

function confirmEditBio() {

    let data = {
        bio: bioTextArea.value.trim()
    }

    let request = new XMLHttpRequest;

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


