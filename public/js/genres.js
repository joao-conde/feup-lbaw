'use strict';
let button = document.querySelector('#add_button');
let genre_name = document.querySelector('#new_genre');
let genres_list = document.querySelector('#genres_list');

button.addEventListener('click',function(event){

	let new_genre = document.createElement('li');

	new_genre.innerHtml = '<li class="list-group-item">${genre_name}</li>';
	console.log(new_genre);

	let request = new XMLHttpRequest();

		event.preventDefault();
    let request = new XMLHttpRequest();
    let method = PUT;
    let api = '/api/user_followers/' + parseInt(userToFollowId.innerHTML);
    let follow = true;


    if(checkIfHasClass(this,'unfollow')) {
        method = DELETE;  
        follow = false;
    }
              

    sendAsyncAjaxRequest(request,api,method,handleAPIResponse.bind(follow,request));



})



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
