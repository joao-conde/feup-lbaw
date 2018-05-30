'use strict';

let buttons = document.querySelectorAll('.band_membership_button');

for (let i = 0; i < buttons.length; i++) {

    buttons[i].addEventListener('click', bandMembershipEventListener.bind(buttons[i]));

}


function bandMembershipEventListener() {

    let bandId = this.querySelector('span.bandId').innerHTML;
    let membership_status = this.querySelector('span.membership_status').innerHTML;

    let request = new XMLHttpRequest();
    let api, method;

    switch (membership_status) {
        case 'pending_application':
            api = '/api/band_application/' + parseInt(bandId) + '/' + + userId + '/canceled';
            method = DELETE;
            break;

        case 'pending_invitation_accept':
            api = '/api/band_invitation/' + parseInt(bandId) + '/' + + userId + '/accepted';
            method = PUT;
            break;

        case 'pending_invitation_reject':
            api = '/api/band_invitation/' + parseInt(bandId) + '/' + + userId + '/rejected';
            method = PUT;
            break;

        case 'member':
            api = '/api/band_membership/' + parseInt(bandId) + '/' + + userId + '/inactive';
            method = DELETE;
            break;

        default:
            break;
    }

    sendAsyncAjaxRequest(request, api, method, handleAPIResponse.bind(this, membership_status, request));

}

function handleAPIResponse(membership_status, request) {

    if (request.status == 200) {

        switch (membership_status) {
            case 'pending_application':
            case 'member':
                this.classList.remove('btn-danger');
                this.classList.add('btn-secondary');
                this.setAttribute('disabled', '');
                this.querySelector('span.btn_follow_label').innerHTML =
                    (membership_status == 'pending_application') ? 'Canceled' : 'Excluded';

                break;

            case 'pending_invitation_accept':
            case 'pending_invitation_reject':
                let buttonGroup = this.parentElement;
                this.parentElement.parentElement.appendChild(this);
                this.parentElement.removeChild(buttonGroup);
                this.removeAttribute('type');
                this.setAttribute('disabled', '');
                this.querySelector('span.btn_follow_label').innerHTML =
                    (membership_status == 'pending_invitation_accept') ? 'Accepted' : 'Rejected';
                break;

            default:
                break;
        }


    }


}
