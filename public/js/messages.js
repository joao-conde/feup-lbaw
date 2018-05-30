'use strict';

let nMessagesLoaded = 0;
let messagesCount = document.querySelector('#message_count');
let messages_div = document.querySelector('div#messages_div');
let read_messages = document.querySelector("#messages_read");

setTimeout(function(){ 
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/messages/' + nMessagesLoaded, GET, updateMessagesHandler);
}, 1000);

function updateMessagesHandler() {

    messages_div.innerHTML = this.responseText;
    let newCount = messages_div.querySelector('#count_messages').innerHTML;

    notsCount.innerHTML = newCount > 0 ? newCount : "";
}

read_messages.addEventListener('click', function(){

    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/read_messages', PUT, null);

    notsCount.innerHTML = "";
});

document.querySelector("#see_more_messages").addEventListener('click', function(){

    nMessagesLoaded++;
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/messages/' + nMessagesLoaded, GET, updateMessagesHandler);
    setTimeout(function() {read_messages.click()});
});