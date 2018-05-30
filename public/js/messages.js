'use strict';

let nMessagesLoaded = 0;
let messagesCount = document.querySelector('#message_count');
let messages_div = document.querySelector('div#messages_div');
let read_messages = document.querySelector("#messages_read");

setInterval(function(){ 
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/messages/' + nMessagesLoaded, GET, updateMessagesHandler);
}, 1000);

function updateMessagesHandler() {
    messages_div.innerHTML = this.responseText;
    let newCount = messages_div.querySelector('#count_messages').innerHTML;

    messagesCount.innerHTML = newCount > 0 ? newCount : "";

    readMessages();
}

console.log(read_messages);

read_messages.addEventListener('click', readMessages);

function readMessages(){

    let ids = document.querySelectorAll(".message_user_id");
    for (let i = 0; i < ids.length; i++) {
        sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/read_messages/' + ids[i].innerHTML , PUT, null);
    }
}

document.querySelector("#see_more_messages").addEventListener('click', function(){

    nMessagesLoaded++;
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/messages/' + nMessagesLoaded, GET, updateMessagesHandler);
    setTimeout(function() {read_messages.click()});
});