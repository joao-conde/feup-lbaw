'use strict';

let followButtons = document.querySelectorAll('.follow_unfollow');

console.log(followButtons);

for(let i in followButtons){

    followButtons[i].addEventListener('click',startStopFollowingEventListener.bind(followButtons[i]));

}


function startStopFollowingEventListener() {

    let userToFollowId = this.querySelector('span.userId').innerHTML;

    let request = new XMLHttpRequest();
    let method = PUT;
    let api = '/api/user_followers/' + parseInt(userToFollowId);
    let follow = true;


    if(checkIfHasClass(this,'unfollow')) {
        method = DELETE;
        follow = false;
    }


    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(this, follow, request));

}

function handleAPIResponse(follow, request) {

    if(request.status == 200) {

        if(follow == true) {

            this.classList.remove('btn-success','follow');
            this.classList.add('btn-danger','unfollow');
            this.querySelector('span.btn_follow_label').innerHTML = 'Unfollow';

        }

        else {

            this.classList.remove('btn-danger','unfollow');
            this.classList.add('btn-success','follow');
            this.querySelector('span.btn_follow_label').innerHTML = "Follow";

        }

    }


}
