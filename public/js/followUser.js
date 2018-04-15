'use strict';

let followButton = document.querySelector('div#profile_pic_div #follow_unfollow');
let userToFollowId = document.querySelector('div#profile_pic_div #user_id');

if(followButton != undefined) {

    followButton.addEventListener('click',startStopFollowingEventListener.bind(followButton));

}

function startStopFollowingEventListener() {

    let request = new XMLHttpRequest();
    let method = PUT;
    let api = '/api/user_followers/' + parseInt(userToFollowId.innerHTML);
    let follow = true;


    if(checkIfHasClass(this,'unfollow')) {
        method = DELETE;  
        follow = false;
    }
              

    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(follow,request));



}

function handleAPIResponse(request) {

    if(request.status == 200) {

        if(this == true) {

            followButton.classList.remove('btn-success','follow');
            followButton.classList.add('btn-danger','unfollow');
            followButton.innerHTML = 'Unfollow'; 
    
        }
    
        else {
    
            followButton.classList.remove('btn-danger','unfollow'); 
            followButton.classList.add('btn-success','follow');
            followButton.innerHTML = "Follow";
            
        }

    }


}
