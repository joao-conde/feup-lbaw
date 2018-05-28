//Add members

let bandId = document.querySelector('#bandId').innerHTML;
let addMemberBtn = document.querySelector('#inviteMemberBtn');
addMemberBtn.addEventListener('click', addMember.bind(addMemberBtn, bandId, addMemberBtn.parentNode.querySelector('input')));


function addMember(bandId, input) {
    
    let request = new XMLHttpRequest();
    let method = PUT;
    
    //TODO: REMOVE HARDCODE ---> select one of suggest dropdown users, get its ID and send here
    let userId = 1;
    console.log("INVITED MEMBER " + input.value + " ID: " + userId);

    let api = '/api/bands/' + bandId + '/invitations/' + userId;

    sendAsyncAjaxRequest(request, api, method, handleInviteMemberAPIResponse.bind(this, request, "put"));
}


function handleInviteMemberAPIResponse(response){

    if (response.status != 200)
        return;

    console.log("RESPONSE " + response.responseText);
    
}



