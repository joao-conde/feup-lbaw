const GET = "get";
const POST = "post";
const PUT = "put";
const DELETE = "delete";

const JSON_ENCODE = "application/json";
const URL_ENCODE = "application/x-www-form-urlencoded";

const ERROR_CODE_GOOD = "00000";

let globalBottomOfPage = false;

function changeActiveTab(index) {
    
    menu_items = document.querySelectorAll("nav#menu li");

        for (let i = 0; i < menu_items.length; i++) {
            let item = menu_items[i];

            if (i == index)
                item.classList.add("active");
            else
                item.classList.remove("active");
        }
}

function convertDateToEpochSecs(dateString, format) {
    
    return new Date(dateString).getTime() / 1000;

}

function convertEpochSecsToDateStringPT(seconds) {
    
    return new Date(seconds*1000).toLocaleDateString("pt-PT");
    
}

function convertEpochSecsToDateString(seconds) {
    
    let date = new Date(seconds*1000);

    let month = (date.getMonth() + 1) < 10 ? '0' + (date.getMonth() + 1) : date.getMonth();
    let day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();

    return date.getFullYear() + '-' + month+ '-' + day;
    
}

function getCurrentDayEpochSecs() {

    let time = new Date();
    let todayString = (time.getMonth() + 1) + "/" + time.getDate() + "/" + time.getFullYear();

    let seconds = convertDateToEpochSecs(todayString);

    return seconds;

}

function getCurrentEpochSecs() {

    return parseInt(new Date().getTime()/1000);

}

function encodeForAjax(data) {
    return Object.keys(data).map(function(k){
        return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
    }).join('&');  
}

function sendAsyncAjaxRequest(request, api, type, receiveListener, encoding, data) {

    if(encoding == URL_ENCODE) 
        data = encodeForAjax(data);


    if(type == GET) {

        let getApi = api + ((data == undefined) ? '' : ('?' + data));

        request.open(type, getApi, true);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);
        request.send();

    }

    else {

        request.open(type, api, true);
        request.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

        if(encoding != undefined)
            request.setRequestHeader('Content-Type', encoding);

        if(data != undefined)
            request.send(data);

        else
            request.send();

    }

    if(receiveListener != undefined) {

        request.addEventListener('load',receiveListener);

    }

}

function addLeadingZero(number) {

    if(number < 10)
        return "0" + number;
    return number;

}

function checkIfHasClass(element, className) {

    return element.classList.contains(className);

}

function toggleProfileField(showEdit, fixedElement, editElement, parentElement, editButton, cancelButton, confirmButton, keysHandler, newValue, innerHTML) {

    if (showEdit == true) {

        let oldValue = innerHTML != undefined ? innerHTML : fixedElement.innerHTML;

        console.log("Old value: " + innerHTML);

        editButton.selfHide();
        confirmButton.selfShow();
        cancelButton.selfShow();

        fixedElement.selfHide();
        editElement.selfShow();
        
        parentElement.replaceChild(editElement, fixedElement);
        editElement.value = oldValue;
        window.addEventListener('keyup', keysHandler);

    }

    else {

        editButton.selfShow();
        confirmButton.selfHide();
        cancelButton.selfHide();

        fixedElement.selfShow();
        editElement.selfHide();

        if (newValue != undefined)
            fixedElement.innerHTML = newValue;
        parentElement.replaceChild(fixedElement, editElement);

        window.removeEventListener('keyup', keysHandler); 

    }

}


Element.prototype.selfShow = function() {

    if(checkIfHasClass(this,'d-none'))
        this.classList.remove('d-none');

}

Element.prototype.selfHide = function() {

    if(!checkIfHasClass(this,'d-none'))
        this.classList.add('d-none');

}

function isBottomOfPage() {

    let scrollTop = document.documentElement.scrollTop;
    let windowInnerHeight = window.innerHeight;
    let offset = scrollTop + windowInnerHeight;
    let bodyHeight = document.documentElement.offsetHeight;

    if(offset >= bodyHeight && !globalBottomOfPage) {

        globalBottomOfPage = true;
        return true;
    }
       
    else {

        globalBottomOfPage = false;
        return false;
    }
        
}
