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

    inputNewMessage.addEventListener('focus',function() {

        badge.innerHTML = 0;
        badge.selfHide();
    });


    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;

    dropdown.addEventListener('click',function(){

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

window.setInterval(requestMoreMessages,CHAT_INTERVAL_REFRESH_TIME);

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



