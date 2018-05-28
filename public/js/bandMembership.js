'use strict';

let buttons = document.querySelectorAll('.band_membership_button');

for (let i = 0; i < buttons.length; i++) {

    buttons[i].addEventListener('click', bandMembershipEventListener.bind(followButtons[i]));

}


function bandMembershipEventListener() {

    let bandId = this.querySelector('span.bandId').innerHTML;
    let membership_status = this.querySelector('span.membership_status').innerHTML;

    let request = new XMLHttpRequest();
    let api;

    switch (membership_status) {
        case value:

            break;

        case value:

            break;

        case value:

            break;

        default:
            break;
    }

    let isUser = checkIfHasClass(userOrBandToFollowSpan, 'isUser');
    let isBand = checkIfHasClass(userOrBandToFollowSpan, 'isBand');

    let followType;

    if (isUser) {
        followType = 'user';
        api = '/api/user_followers/' + parseInt(userOrBandToFollowId);
    }

    else if (isBand) {
        followType = 'band';
        api = '/api/bands/' + parseInt(userOrBandToFollowId) + '/followers/' + userId;
    }

    let follow = true;


    if (checkIfHasClass(this, 'unfollow')) {
        method = DELETE;
        follow = false;
    }


    sendAsyncAjaxRequest(request, api, PUT, handleAPIResponse.bind(this, follow, request, followType));

}

function handleAPIResponse(follow, request, followType) {

    if (request.status == 200) {

        if (follow == true) {

            this.classList.remove('btn-success', 'follow');
            this.classList.add('btn-danger', 'unfollow');
            this.querySelector('span.btn_follow_label').innerHTML = followType == 'user' ? 'Unfollow' : 'Unfollow Band';

        }

        else {

            this.classList.remove('btn-danger', 'unfollow');
            this.classList.add('btn-success', 'follow');
            this.querySelector('span.btn_follow_label').innerHTML = followType == 'user' ? "Follow" : 'Follow Band';

        }

    }


}
