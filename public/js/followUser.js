'use strict';

let followButtons = document.querySelectorAll('.follow_unfollow');

for (let i = 0; i < followButtons.length; i++) {

    followButtons[i].addEventListener('click', startStopFollowingEventListener.bind(followButtons[i]));

}


function startStopFollowingEventListener() {

    let userOrBandToFollowSpan = this.querySelector('span.userOrBandId');
    let userOrBandToFollowId = userOrBandToFollowSpan.innerHTML;

    let request = new XMLHttpRequest();
    let method = PUT;
    let api;

    let isUser = checkIfHasClass(userOrBandToFollowSpan,'isUser');
    let isBand = checkIfHasClass(userOrBandToFollowSpan,'isBand');

    let followType;

    if(isUser) {
        followType = 'user';
        api = '/api/user_followers/' + parseInt(userOrBandToFollowId);
    }
       
    else if(isBand) {
        followType = 'band';
        api = '/api/bands/' + parseInt(userOrBandToFollowId) + '/followers/' + userId;
    }
    
    let follow = true;


    if(checkIfHasClass(this,'unfollow')) {
        method = DELETE;
        follow = false;
    }
    
    
    sendAsyncAjaxRequest(request,api,method, handleUnfollowFollowAPIResponse.bind(this, follow, request, followType));

}

function handleUnfollowFollowAPIResponse(follow, request, followType) {

    if(request.status == 200) {

        if(follow == true) {

            this.classList.remove('btn-success','follow');
            this.classList.add('btn-danger','unfollow');
            this.querySelector('span.btn_follow_label').innerHTML = followType == 'user' ? 'Unfollow' : 'Unfollow Band';

        }

        else {

            this.classList.remove('btn-danger','unfollow');
            this.classList.add('btn-success','follow');
            this.querySelector('span.btn_follow_label').innerHTML = followType == 'user' ? "Follow" : 'Follow Band';

        }

    }


}
