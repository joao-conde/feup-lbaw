const CHAT_INTERVAL_REFRESH_TIME = 1000;
let newMessageForms = document.querySelectorAll('form.sendMessageForm');
let messagesListDivs = document.querySelectorAll('div.messagesList');

function addListenersToSendMessageForm(newMessageForm, messagesListDiv) {

    let inputNewMessage = newMessageForm.querySelector('textarea.messageInput');
    let sendMessageButton = newMessageForm.querySelector('button.sendMessageButton');
    let friendId = parseInt(newMessageForm.querySelector('p.friendId').innerHTML);

    sendMessageButton.addEventListener('click',sendMessageRequest.bind(this,inputNewMessage,friendId));

    inputNewMessage.addEventListener('keyup',enterKeyListener.bind(this,inputNewMessage,friendId));

    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;

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
    addListenersToSendMessageForm(newMessageForms[i],messagesListDivs[i]);
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

        sendAsyncAjaxRequest(request, api, GET, handleNewMessagesRequestListener.bind(request,messagesListDivs[i]), URL_ENCODE, data);

    }

}


function handleNewMessagesRequestListener(messagesListDiv) {

    if(this.status != 200 || this.responseText == '')
        return;

    let newMessages = createElementsArrayFromHTML(this.responseText);

    for(let i = 0; i < newMessages.length; i++) {

        messagesListDiv.appendChild(newMessages[i]);

    }

    messagesListDiv.parentElement.scrollTop = messagesListDiv.parentElement.scrollHeight;

}


function enterKeyListener(inputNewMessage, friendId, evento) {

    var key = evento.which || evento.keyCode;

    if (key== 13)
        sendMessageRequest(inputNewMessage,friendId);

}