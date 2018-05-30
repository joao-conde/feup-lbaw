'use strict';

let nNotificationsLoaded = 0;
let notsCount = document.querySelector('#notification_count');
let notifications_div = document.querySelector('div#notifications_div');
let read_notifications = document.querySelector("#notifications_read");

setTimeout(function(){ 
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/notifications/' + nNotificationsLoaded, GET, updateNotificationsHandler);
}, 2500);

function updateNotificationsHandler() {

    notifications_div.innerHTML = this.responseText;
    let newCount = notifications_div.querySelector('#count_hidden').innerHTML;

    notsCount.innerHTML = newCount > 0 ? newCount : "";
}

read_notifications.addEventListener('click', function(){

    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/read_notifications', PUT, null);

    notsCount.innerHTML = "";
});

document.querySelector("#see_more_notifications").addEventListener('click', function(){

    nNotificationsLoaded++;
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/notifications/' + nNotificationsLoaded, GET, updateNotificationsHandler);
    setTimeout(function() {read_notifications.click()});
});


