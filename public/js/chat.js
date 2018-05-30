const CHAT_INTERVAL_REFRESH_TIME = 1000;
let newMessageForms = document.querySelectorAll('form.sendMessageForm');
let messagesListDivs = document.querySelectorAll('div.messagesList');
let badges = document.querySelectorAll('span.newMessages');
let dropDownItems = document.querySelectorAll('div.chat_dropdown');

function addListenersToSendMessageForm(newMessageForm, messagesListDiv, dropdown, badge) {

    let inputNewMessage = newMessageForm.querySelector('textarea.messageInput');
    let sendMessageButton = newMessageForm.querySelector('button.sendMessageButton');
    let friendId = parseInt(newMessageForm.querySelector('p.friendId').innerHTML);

    sendMessageButton.addEventListener('click',sendMessageRequest.bind(this,inputNewMessage,friendId));

    inputNewMessage.addEventListener('keyup',enterKeyListener.bind(this,inputNewMessage,friendId));

    inputNewMessage.addEventListener('focus',cleanNotifications.bind(this,badge, friendId));
    inputNewMessage.addEventListener('click',cleanNotifications.bind(this,badge, friendId));

    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;

    dropdown.addEventListener('click',cleanNotifications.bind(this,badge, friendId));

}

function cleanNotifications(badge, friendId) {
    
    let request = new XMLHttpRequest();
    let api = '/api/read_messages/user/' + friendId;

    sendAsyncAjaxRequest(request,api,PUT, function() {

        if(this.status !=200)
            return;

        badge.innerHTML = 0;
        badge.selfHide();


    });
    
}


function cleanNotificationsBand(badge, bandId) {


    let request = new XMLHttpRequest();
    let api = '/api/read_messages/band/' + bandId;

    sendAsyncAjaxRequest(request,api,PUT, function() {

        if(this.status !=200)
            return;

        badge.innerHTML = 0;
        badge.selfHide();


    });

}


function sendMessageRequest(inputNewMessage, friendId, event) {
    
    if(event != undefined)
        event.preventDefault();

    let request = new XMLHttpRequest();
    let api = '/api/users/' + userId + '/messages/' + friendId;

    let data = JSON.stringify({message: inputNewMessage.value.trim()});

    sendAsyncAjaxRequest(request,api,POST,function() {
        
        if(this.status != 200)
            return;
        inputNewMessage.value = "";
    
    }
    ,JSON_ENCODE,data);

}


for(let i = 0; i < newMessageForms.length; i++) {
    addListenersToSendMessageForm(newMessageForms[i],messagesListDivs[i], dropDownItems[i],badges[i]);
}



function requestMoreMessages() {

    for(let i = 0; i < messagesListDivs.length; i++) {
       
        let lastMessageId = messagesListDivs[i].children.length > 0 ? messagesListDivs[i].children[messagesListDivs[i].children.length-1].querySelector('p.messageId').innerHTML : 0;
        let friendId = parseInt(newMessageForms[i].querySelector('p.friendId').innerHTML);

        let request = new XMLHttpRequest();
        let api = '/api/users/' + userId + '/messages/' + friendId;
        let data = {
            lastMessageId: lastMessageId
        }

        sendAsyncAjaxRequest(request, api, GET, handleNewMessagesRequestListener.bind(request,messagesListDivs[i], badges[i]), URL_ENCODE, data);

    }

}


function handleNewMessagesRequestListener(messagesListDiv, badge) {

    if(this.status != 200 || this.responseText == '')
        return;

    let newMessages = createElementsArrayFromHTML(this.responseText);


    for(let i = 0; i < newMessages.length; i++) {

        messagesListDiv.appendChild(newMessages[i]);

        badge.innerHTML = parseInt(badge.innerHTML) + 1;
        badge.selfShow();

    }

    let messagesOwns = messagesListDiv.querySelectorAll('p.isown');
    let isOwn = parseInt(messagesOwns[messagesOwns.length-1].innerHTML);

    if(isOwn == 1) {

        badge.innerHTML = 0;
        badge.selfHide();

    }


    if(newMessages.length > 0) {
        badge.innerHTML = newMessages.length;
    }
        
    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;



}


function enterKeyListener(inputNewMessage, friendId, evento) {

    var key = evento.which || evento.keyCode;

    if (key== 13)
        sendMessageRequest(inputNewMessage,friendId);

}

function enterKeyListenerBand(inputNewMessage, bandId, evento) {

    var key = evento.which || evento.keyCode;

    if (key== 13)
        sendBandMessageRequest(inputNewMessage,bandId);

}

//band chat


let newBandMessageForms = document.querySelectorAll('form.sendBandMessageForm');
let bandMessagesListDivs = document.querySelectorAll('div.messagesListBand');
let bandDropDownItems = document.querySelectorAll('div.chat_dropdown_band');
let bandBadges = document.querySelectorAll('span.newMessagesBand');

window.setInterval(requestPeriodicMessages,CHAT_INTERVAL_REFRESH_TIME);

function requestPeriodicMessages() {

    requestMoreMessages();
    requestMoreBandMessages();

}

function requestMoreBandMessages() {

    for(let i = 0; i < bandMessagesListDivs.length; i++) {
       
        let lastMessageId = bandMessagesListDivs[i].children.length > 0 ? bandMessagesListDivs[i].children[bandMessagesListDivs[i].children.length-1].querySelector('p.messageId').innerHTML : 0;
        let bandId = parseInt(newBandMessageForms[i].querySelector('p.bandId').innerHTML);

        let request = new XMLHttpRequest();
        let api = '/api/bands/' + bandId + '/messages';
        let data = {
            lastMessageId: lastMessageId
        }

        sendAsyncAjaxRequest(request, api, GET, handleNewMessagesRequestListenerBand.bind(request,bandMessagesListDivs[i], bandBadges[i]), URL_ENCODE, data);

    }

}

function handleNewMessagesRequestListenerBand(messagesListDiv, badge) {

    if(this.status != 200 || this.responseText == '')
        return;

    let newMessages = createElementsArrayFromHTML(this.responseText);


    for(let i = 0; i < newMessages.length; i++) {

        messagesListDiv.appendChild(newMessages[i]);

        badge.innerHTML = parseInt(badge.innerHTML) + 1;
        badge.selfShow();

    }

    let messagesOwns = messagesListDiv.querySelectorAll('p.isown');
    let isOwn = parseInt(messagesOwns[messagesOwns.length-1].innerHTML);

    if(isOwn == 1) {

        badge.innerHTML = 0;
        badge.selfHide();

    }


    if(newMessages.length > 0) {
        badge.innerHTML = newMessages.length;
    }
        
    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;

}


for(let i = 0; i < newBandMessageForms.length; i++) {
    addListenersToSendBandMessageForm(newBandMessageForms[i],bandMessagesListDivs[i], bandDropDownItems[i],badges[i]);
}


function addListenersToSendBandMessageForm(newBandMessageForm, bandMessagesListDiv, dropdown, badge) {

    let inputNewMessageBand = newBandMessageForm.querySelector('textarea.messageInput');
    let sendBandMessageButton = newBandMessageForm.querySelector('button.sendMessageButton');
    let bandId = parseInt(newBandMessageForm.querySelector('p.bandId').innerHTML);

    sendBandMessageButton.addEventListener('click',sendBandMessageRequest.bind(this,inputNewMessageBand,bandId));

    inputNewMessageBand.addEventListener('keyup',enterKeyListenerBand.bind(this,inputNewMessageBand,bandId));

    inputNewMessageBand.addEventListener('focus',cleanNotificationsBand.bind(this,badge, bandId));
    inputNewMessageBand.addEventListener('click',cleanNotificationsBand.bind(this,badge, bandId));

    bandMessagesListDiv.parentElement.scrollTop = bandMessagesListDiv.parentElement.scrollHeight;

    dropdown.addEventListener('click',cleanNotificationsBand.bind(this,badge, bandId));

}

function sendBandMessageRequest(inputNewMessageBand, bandId) {

    if(event != undefined)
        event.preventDefault();

    let request = new XMLHttpRequest();
    let api = '/api/bands/' + bandId + '/messages';

    let data = JSON.stringify({message: inputNewMessageBand.value.trim()});

    sendAsyncAjaxRequest(request,api,POST,function() {

        if(this.status != 200)
            return;
            inputNewMessageBand.value = "";
    
    }
    ,JSON_ENCODE,data);

}



//online offline

setSatus(true);

function setSatus(online) {

    let request = new XMLHttpRequest();
    let api = '/api/userstate';
    let data = JSON.stringify({online: online});

    sendAsyncAjaxRequest(request,api,PUT,function() {
    
        console.log(this.responseText);
    
    }, JSON_ENCODE, data);


}

window.addEventListener('beforeunload', setSatus.bind(this,false));


