'use strict';

let followButton = document.querySelector('div#profile_pic_div #follow_unfollow');
let userToFollowId = document.querySelector('div#profile_pic_div #user_id');

// let followButton = document.createElement('button');
// let unfollowButton = document.createElement('button');

// followButton.setAttribute('id','follow_unfollow');
// followButton.classList.add('btn');
// followButton.classList.add('btn-success ');
// followButton.classList.add('follow');

// followButton.setAttribute('id','follow_unfollow');
// followButton.classList.add('btn');
// followButton.classList.add('btn-success ');
// followButton.classList.add('follow');



{/* <button id="follow_unfollow" class="btn btn-danger unfollow"> Unfollow </button>
<button id="follow_unfollow" class="btn btn-success follow"> Follow </button> */}

if(followButton != null) {

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
              

    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(follow));



}

function handleAPIResponse() {

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
