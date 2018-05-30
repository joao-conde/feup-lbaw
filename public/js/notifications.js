'use strict';


setInterval(function(){ 
    sendAsyncAjaxRequest(new XMLHttpRequest(), '/api/notifications', GET, updateNotificationsHandler);
}, 1000);

function updateNotificationsHandler() {

    let notifications_div = document.querySelector('div#notifications_div');
    notifications_div.innerHTML = this.responseText;
    
    let newCount = notifications_div.querySelector('#count_hidden').innerHTML;

    document.querySelector('#notification_count').innerHTML = newCount;
}