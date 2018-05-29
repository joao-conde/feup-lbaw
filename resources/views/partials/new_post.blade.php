<div class="jumbotron p-2 pt-3 post mb-2" id="newpost">
    <div class="row ">
        <div class="col-auto pr-0 mr-2 ">
            <img src="{{ Auth::user()->getProfilePicturePath() }}" class="profile_img_chat ">
        </div>
        @if($bandNewPost == true)
        <div class="col-auto">
            <span id="lock_locked_post" class=" d-none clickable">
                <i class="fas fa-lock text-primary"></i>
            </span>
            <span id="lock_opened_post" class="clickable">
                <i class="fas fa-lock-open text-primary"></i>
            </span>
        </div>
        @endif
        <textarea name="text" placeholder="New post" class="col text-primary form-control-sm border border-secondary mr-3"
             id="new_post_ta" style="height: 30px;"></textarea>
             
    </div>

    <div class="p-0 row my-3 justify-content-end d-none soundCloudRow">
        <div class="pl-5 pr-0 col-12">
            <small class="d-inline"><i class=" text-warning fab fa-soundcloud"></i></small>
            <input id="soundCloudLink" class="w-75 d-inline" type="text">
        </div>
    </div>

    <div class="p-0 row my-3 justify-content-end d-none youTubeRow">
        <div class="pl-5 pr-0 col-12">
            <small class="d-inline"><i class="text-danger fab fa-youtube"></i></small>
            <input id="youTubeLink" class="w-75 d-inline" type="text">
        </div>
    </div>


    <div class="row justify-content-end mt-2" id="btns" role="group">

        <div class="btn-group col-auto">
            <button type="button" class="btn btn-light d-none ">
                <i class="far fa-image"></i>
            </button>
            <button id="youTubeButton" type="button" class="btn btn-light mr-2">
                <i class="fas fa-film"></i>
            </button>
            <button id="soundCloudButton" type="button" class="btn btn-light border">
                <i class="fas fa-music"></i>
            </button>
            
            <div class="ml-2" id="postbutton">
                <input type="submit" disabled value="post" class="btn btn-primary btn pull-right justify-content-end">
            </div>
        </div>

    </div>


</div>