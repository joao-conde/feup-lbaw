'use strict';
/**
 *   Lock && Unlock
 */ 

let editMode = false;

let editFields = document.querySelectorAll('.edit_field');
let lockLocked = document.querySelector('span#lock_locked');
let lockOpened = document.querySelector('span#lock_opened');

let submitPasswordButton = document.querySelector('button#submit_password');
let passwordField = document.querySelector('input#verify_password');

let wrongPwd = document.querySelector('div#modal-msg');
let emptyPwd = document.querySelector('div#modal-msg-empty');

let closeModalBtn = document.querySelector('button#close_button');

let userSkillsStars = document.querySelectorAll('div.user_skill');

if(lockLocked != null) {

    lockLocked.addEventListener('click',openModalHandler);
    submitPasswordButton.addEventListener('click',verifyPassword);
    closeModalBtn.addEventListener('click',closeModalHandler);
    lockOpened.addEventListener('click',lock);

}



function toggleEdits(show) {

    for(let i = 0; i < editFields.length; i++) {

        !show ? editFields[i].selfHide() : editFields[i].selfShow();

    }

    for(let i = 0; i < userSkillsStars.length; i++) {

        if(editMode)
            userSkillsStars[i].classList.add('clickable');
        else
            userSkillsStars[i].classList.remove('clickable');        
    }

}

function lock() {

    editMode = false;
    toggleEdits(false);

    lockLocked.selfShow();
    lockOpened.selfHide();


}

function open() {

    editMode = true;
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

let birthDateTimeStamp;
let birthDate; 

if(dateInput != null) {

    birthDateTimeStamp = convertDateToEpochSecs(dateInput.value);
    birthDate = convertEpochSecsToDateString(birthDateTimeStamp);

}


if (editNameButton != null) {

    editNameButton.addEventListener('click',editField.bind(this,usernameh3,nameInput,parent,editNameButton,cancelNameButton,confirmNameButton,keyUpAuxNameField,editNameAid,undefined));
    cancelNameButton.addEventListener('click',cancelEditField.bind(this,usernameh3,nameInput,parent,editNameButton,cancelNameButton,confirmNameButton,keyUpAuxNameField,editNameAid));
    confirmNameButton.addEventListener('click',confirmEditField.bind(this,'name',nameInput));

    editBioButton.addEventListener('click',editField.bind(this,bioPara,bioTextArea,parentBio,editBioButton,cancelBioButton,confirmBioButton,keyUpAuxBioField,editBioAid,undefined));
    cancelBioButton.addEventListener('click',cancelEditField.bind(this,bioPara,bioTextArea,parentBio,editBioButton,cancelBioButton,confirmBioButton,keyUpAuxBioField,editBioAid));
    confirmBioButton.addEventListener('click', confirmEditField.bind(this,'bio',bioTextArea));

    
    editDateButton.addEventListener('click',editField.bind(this,dateField,dateInput,parentDateFields,editDateButton,cancelDateButton,confirmDateButton,keyUpAuxDateField,editDateAid,birthDate));
    cancelDateButton.addEventListener('click',cancelEditField.bind(this,dateField,dateInput,parentDateFields,editDateButton,cancelDateButton,confirmDateButton,keyUpAuxDateField,editDateAid));
    confirmDateButton.addEventListener('click',confirmEditField.bind(this,'birthdate',dateInput));

}


function keyUpAuxNameField(event) {


    if (event.keyCode == 13) {

        confirmEditField('name',nameInput);
    }
    else if (event.keyCode == 27) {

        cancelEditField(usernameh3,nameInput,parent,editNameButton,cancelNameButton,confirmNameButton,keyUpAuxNameField,editNameAid);
    }

}

function keyUpAuxBioField(event) {


    if (event.keyCode == 13) {

        confirmEditField('bio',bioTextArea);
    }
    else if (event.keyCode == 27) {

        cancelEditField(bioPara,bioTextArea,parentBio,editBioButton,cancelBioButton,confirmBioButton,keyUpAuxBioField,editBioAid);
    }

}

function keyUpAuxDateField(event) {


    if (event.keyCode == 13) {

        confirmEditField('birthdate',dateInput);
    }
    else if (event.keyCode == 27) {

        cancelEditField(dateField,dateInput,parentDateFields,editDateButton,cancelDateButton,confirmDateButton,keyUpAuxDateField,editDateAid);
    }

}

function editField(fixedField,editField,parentField,editButton,cancelButton,confirmButton,keysListener,aidElement,innerHTML, event) {

    toggleProfileField(true, fixedField, editField, parentField, editButton, cancelButton, confirmButton, keysListener,undefined,innerHTML);
    aidElement.selfHide();

}

function cancelEditField(fixedField,editField,parentField, editButton, cancelButton, confirmButton, keysListener, aidElement,event) {

    toggleProfileField(false, fixedField, editField, parentField, editButton, cancelButton, confirmButton, keysListener, undefined);
    aidElement.selfShow();


}

function confirmEditField(key, editElement, event) {

    let data = {}
    data[key] = editElement.value.trim();

    let request = new XMLHttpRequest();
    sendAsyncAjaxRequest(request,api,PUT, updateProfile.bind(request, key, data[key]), JSON_ENCODE, JSON.stringify(data));

}

function acknowledgeEditField(fixedElement,editField,parentField,editButton,cancelButton,confirmButton,keyslistener, value,aidElement) {
    toggleProfileField(false, fixedElement, editField, parentField, editButton, cancelButton, confirmButton, keyslistener, value);
    aidElement.selfShow();
}


function updateProfile(key, value, event) {

    if (this.status == 200) {

        if(key == 'name') {
            acknowledgeEditField(usernameh3,nameInput,parent,editNameButton,cancelNameButton,confirmNameButton,keyUpAuxNameField, value, editNameAid);
        }
        else if(key == 'bio') {
            acknowledgeEditField(bioPara,bioTextArea,parentBio,editBioButton,cancelBioButton,confirmBioButton,keyUpAuxBioField,value, editBioAid);
        }

        else if(key == 'birthdate') {

            let newBirthDateTimeStamp = convertDateToEpochSecs(value);
            let newBirthDate = convertEpochSecsToDateStringPT(newBirthDateTimeStamp);

            let innerHTML = 'Born on ' + newBirthDate;

            acknowledgeEditField(dateField,dateInput,parentDateFields,editDateButton,cancelDateButton,confirmDateButton,keyUpAuxDateField,innerHTML, editDateAid);
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

if(buttonPicture != null) {

    buttonPicture.addEventListener('click',selectPicture);
    inputPicture.addEventListener('change',sendPicture);

}



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


/**
 * Edit/remove/add skill
 */

let skills = document.querySelectorAll('div.user_skill');
let skillList = document.querySelector('div#new_skill_dd');

for(let i = 0; i < skills.length; i++) {

    let skill = skills[i];
    let fullStars = skill.querySelectorAll('.fullstar');
    let emptyStars = skill.querySelectorAll('.emptystar');
    let skillId = parseInt(skill.querySelector('small.user_skill_id').innerHTML);
    let skillName = skill.querySelector('p.skillName').innerHTML;

    let removeSkillButton = skill.querySelector('span.delete_skill_button');

    if(removeSkillButton != null)
        removeSkillButton.addEventListener('click',confirmRemoveSkill.bind(this,skill,skillId,i,skillName));

    skills[i].addEventListener('mouseout', paintStars.bind(this,skills[i],undefined));

    for(let j = 0; j < 5; j++) {

        fullStars[j].addEventListener('mouseover', skillStarHoverListener.bind(this,j,true));
        emptyStars[j].addEventListener('mouseover', skillStarHoverListener.bind(this,j,true));
        fullStars[j].addEventListener('click', skillConfirmEditClickListener.bind(skillId, skill));
        emptyStars[j].addEventListener('click', skillConfirmEditClickListener.bind(skillId, skill));

    }

}


function skillStarHoverListener(level,edit,event) {

    if(!editMode)
        return;

    let target = event.target;
    let elementType = event.target.tagName;

    let skillElement;

    if(elementType == 'SPAN') {
        skillElement = target.parentElement;
    }
    else if(elementType == 'svg') {
        skillElement = target.parentElement.parentElement;
    }

    else if(elementType == 'path') {
        skillElement = target.parentElement.parentElement.parentElement;
    }

    if(edit)
        paintStars(skillElement,level);
    else
        paintStarsNewSkill(skillElement,level);

}

function skillConfirmEditClickListener(skillElement,event) {

    let skillId = this;

    let fullStars = skillElement.querySelectorAll('.fullstar');
    
    let level;
    
    for(level = 0; level < fullStars.length; level++) {

        if(checkIfHasClass(fullStars[level],'d-none'))
            break;

    }

    let request = new XMLHttpRequest();
    let api = '/api/user_skills/' + skillId;

    let data = {
        level : level
    }

    sendAsyncAjaxRequest(request,api,PUT,updateSkillAjaxRequestListener.bind(request,skillElement,level),JSON_ENCODE,JSON.stringify(data));

}

function updateSkillAjaxRequestListener(skillElement,level) {

    let status = this.status;

    skillElement.querySelector('.user_skill_level').innerHTML = level;
    
    if(status == 200)
        paintStars(skillElement,level-1);


}

function paintStars(skillElement,level) {
    
    if(!editMode)
        return;

    let currentLevel;

    if(level != undefined)
        currentLevel = level;

    else {
        currentLevel = parseInt(skillElement.querySelector('.user_skill_level').innerHTML) - 1;
    }


    for(let i = 0; i < 5; i++) {

        let paintStar = (i <= currentLevel);

        let fullStar = skillElement.children[3*i + 1];
        let emptyStar = skillElement.children[3*i + 2];


        if(paintStar) {
            fullStar.selfShow();
            emptyStar.selfHide()
        }
        else {
            fullStar.selfHide();
            emptyStar.selfShow();
        }

    }
}

function confirmRemoveSkill(skillElement, skillId, childNo, skillName) {

    let request = new XMLHttpRequest();
    let api = '/api/user_skills/' + skillId;

    sendAsyncAjaxRequest(request,api,DELETE,removeSkillAjaxRequestListener.bind(request,skillElement, childNo, skillId, skillName));

}

function removeSkillAjaxRequestListener(skillElement,childNo,skillId,skillName) {

    if(this.status != 200)
        return;

    let parent = skillElement.parentElement;
    
    parent.removeChild(skillElement);

    //insert in list of skills user do not have

    let div1 = document.createElement('div');
    div1.classList.add('row','justify-content-between', 'mb-2');
    
    let smallName = document.createElement('small');
    smallName.classList.add('d-inline','px-3','col','align-self-center', 'skillName');
    smallName.innerHTML = skillName;

    let smallId = document.createElement('small');
    smallId.classList.add('d-none','px-3','col','align-self-center', 'skillId');
    smallId.innerHTML = skillId;

    let div2 = document.createElement('div');
    div2.classList.add('stars','d-inline','px-3');

    for(let i = 0; i < 5; i++) {

        let span1 = document.createElement('span');
        span1.classList.add('mt-1', 'text-primary','fullstar','clickable','d-none','previouslyDeletedItem');

        let elI1 = document.createElement('i');
        elI1.classList.add('fas','fa-star');

        let span2 = document.createElement('span');
        span2.classList.add('mt-1', 'text-primary','emptystar','clickable','previouslyDeletedItem');

        let elI2 = document.createElement('i');
        elI2.classList.add('far','fa-star');

        let span3 = document.createElement('span');
        span3.classList.add('d-none','level');
        span3.innerHTML = i;

        span1.appendChild(elI1);
        span2.appendChild(elI2);

        div2.appendChild(span1);
        div2.appendChild(span2);
        div2.appendChild(span3);

        span1.addEventListener('mouseover', paintStarsNewSkill.bind(this,div2,i));
        span2.addEventListener('mouseover', paintStarsNewSkill.bind(this,div2,i));
        span1.addEventListener('click', confirmAddSkill.bind(this,parseInt(smallId.innerHTML), i+1, skillName));
        span2.addEventListener('click', confirmAddSkill.bind(this,parseInt(smallId.innerHTML), i+1), skillName);


    }

    div1.addEventListener('mouseout',eraseAllStarsNewSkill.bind(div2));
    div1.appendChild(smallName);
    div1.appendChild(smallId);
    div1.appendChild(div2);

    for(let i = 0; i < skillList.children.length; i++) {

        let name = skillList.children[i].querySelector('small.skillName').innerHTML;

        if(name > skillName) {

            skillList.insertBefore(div1,skillList.children[i]);
            break;
        }
            

    }

}

if(skillList != null) {

    for(let i = 0; i < skillList.children.length; i++) {

        let skill = skillList.children[i];
        
        let fullStars = skill.querySelectorAll('.fullstar');
        let emptyStars = skill.querySelectorAll('.emptystar');
        let skillId = parseInt(skill.querySelector('small.skillId').innerHTML);
        let skillName = skill.querySelector('small.skillName').innerHTML;
    
        skill.addEventListener('mouseout',eraseAllStarsNewSkill.bind(skill));
    
        for(let j = 0; j < 5; j++) {
    
            fullStars[j].addEventListener('mouseover', skillStarHoverListener.bind(this,j,false));
            emptyStars[j].addEventListener('mouseover', skillStarHoverListener.bind(this,j,false));
            fullStars[j].addEventListener('click', confirmAddSkill.bind(this,skillId, j+1,skillName));
            emptyStars[j].addEventListener('click', confirmAddSkill.bind(this,skillId, j+1, skillName));
    
        }
    
    }

}



function paintStarsNewSkill(skillElement,level) {

    for(let i = 0; i < 5; i++) {

        let paintStar = (i <= level);

        let fullStar = skillElement.children[3*i];
        let emptyStar = skillElement.children[3*i + 1];

        if(paintStar) {
            fullStar.selfShow();
            emptyStar.selfHide()
        }
        else {
            fullStar.selfHide();
            emptyStar.selfShow();
        }

    }

}

function eraseAllStarsNewSkill() {

    let fullStar = this.querySelectorAll('.fullstar');
    let emptyStar = this.querySelectorAll('.emptystar');

    for(let i = 0; i < fullStar.length; i++) {

        fullStar[i].selfHide();
        emptyStar[i].selfShow();

    }

}

function confirmAddSkill(skillId, level, skillName) {

    let request = new XMLHttpRequest();
    let api = '/api/user_skills/' + skillId;

    let data = {
        level : level
    }

    sendAsyncAjaxRequest(request,api,PUT,addSkillAjaxRequestHandler.bind(request,skillId,level,skillName),JSON_ENCODE,JSON.stringify(data));

}


function addSkillAjaxRequestHandler(skillId,level,skillName) {

    if(this.status != 200)
        return;


    let divUserSkill = document.createElement('div');
    divUserSkill.classList.add('user_skill');

    let pSkillName = document.createElement('p');
    pSkillName.classList.add('mr-2','have_it','d-inline', 'skillName');
    pSkillName.innerHTML = skillName;

    divUserSkill.appendChild(pSkillName);

    divUserSkill.addEventListener('mouseout', paintStars.bind(this,divUserSkill,undefined));

    for(let i = 0; i < 5; i++) {

        let span1 = document.createElement('span');
        span1.classList.add('mt-1','text-primary', 'fullstar');

        let i1 = document.createElement('i');
        i1.classList.add('fas','fa-star');

        span1.appendChild(i1);

        let span2 = document.createElement('span');
        span2.classList.add('mt-1','text-primary', 'emptystar');

        let i2 = document.createElement('i');
        i2.classList.add('far','fa-star');

        span2.appendChild(i2);

        let span3 = document.createElement('span');
        span3.classList.add('d-none','level');

        if(i < level) 
            span2.classList.add('d-none');
        else
            span1.classList.add('d-none');

        divUserSkill.appendChild(span1);
        divUserSkill.appendChild(span2);
        divUserSkill.appendChild(span3);

        span1.style.marginLeft = "2px";
        span2.style.marginLeft = "2px";
        span1.style.cursor = "pointer";
        span2.style.cursor = "pointer";

        span1.addEventListener('mouseover', skillStarHoverListener.bind(this,i,true));
        span2.addEventListener('mouseover', skillStarHoverListener.bind(this,i,true));
        span1.addEventListener('click', skillConfirmEditClickListener.bind(skillId, divUserSkill));
        span2.addEventListener('click', skillConfirmEditClickListener.bind(skillId, divUserSkill));
        

    }

    let smallSkillId = document.createElement('small');
    smallSkillId.classList.add('d-none','user_skill_id');
    smallSkillId.innerHTML = skillId;

    let smallSkillLevel = document.createElement('small');
    smallSkillLevel.classList.add('d-none','user_skill_level');
    smallSkillLevel.innerHTML = level;

    let spanDelete = document.createElement('span');
    spanDelete.classList.add('edit_field', 'delete_skill_button');

    let elementI = document.createElement('i');
    elementI.classList.add('fas', 'fa-times', 'text-danger');

    spanDelete.appendChild(elementI);
    spanDelete.style.marginLeft = "2px";


    divUserSkill.appendChild(smallSkillId);
    divUserSkill.appendChild(smallSkillLevel);
    divUserSkill.appendChild(spanDelete);

    spanDelete.style.cursor = 'pointer';
    
    document.querySelector('div#skills_list').appendChild(divUserSkill);

    spanDelete.addEventListener('click', confirmRemoveSkill.bind(this,divUserSkill, skillId, document.querySelector('div#skills_list').children.length-1,skillName));

    for(let i = 0; i < skillList.children.length; i++) {

        let small = skillList.children[i].querySelector('small.skillId');
        let id = parseInt(small.innerHTML); 
        if(id == skillId) {

            skillList.removeChild(small.parentElement);

        }

    }

    editFields = document.querySelectorAll('.edit_field');


}


//user location

let locationsDiv = document.querySelectorAll('div.location');

for(let i = 0; i < locationsDiv.length; i++) {

    let cityId = parseInt(locationsDiv[i].querySelector('.cityId').innerHTML);
    let cityName = locationsDiv[i].querySelector('.cityName').innerHTML;
    let countryName = locationsDiv[i].querySelector('.countryName').innerHTML;

    locationsDiv[i].addEventListener('click',editLocation.bind(this,cityId,cityName,countryName));

}

function editLocation(cityId,cityName,countryName) {

    let data = {locationId:cityId}
    let request = new XMLHttpRequest();
    sendAsyncAjaxRequest(request,api,PUT,editLocationAjaxRequestHandler.bind(request,cityName,countryName),JSON_ENCODE,JSON.stringify(data));

}

function editLocationAjaxRequestHandler(city,country) {

    if(this.status != 200)
        return;

    let locationElement = document.querySelector('i#user_location');

    locationElement.innerHTML = city + ', ' + country;

    let deleteButton = document.querySelector('span#delete_location_button');

    if(deleteButton != null) {
        deleteButton.selfShow();
        return;
    }
        

    let spanElement = document.createElement('span');
    spanElement.id = "delete_location_button";
    spanElement.classList.add('edit_field', 'clickable');

    let iconElement = document.createElement('i');
    iconElement.classList.add('fas', 'fa-times', 'text-danger');

    spanElement.appendChild(iconElement);
    spanElement.addEventListener('click',deleteLocation);

    locationElement.parentElement.insertBefore(spanElement,locationElement.nextSibling);
    editFields = document.querySelectorAll('.edit_field');

}

let deleteButton = document.querySelector('span#delete_location_button');

if(deleteButton != null)
    deleteButton.addEventListener('click',deleteLocation);

function deleteLocation() {

    let request = new XMLHttpRequest();

    let deleteApi = api + '/location';

    sendAsyncAjaxRequest(request,deleteApi,DELETE,deleteLocationAjaxRequestHandler);

}

function deleteLocationAjaxRequestHandler() {

    if(this.status != 200)
        return;
    
    let locationElement = document.querySelector('i#user_location');
    let deleteButton = document.querySelector('span#delete_location_button');

    locationElement.innerHTML = '';
    deleteButton.selfHide();

}

