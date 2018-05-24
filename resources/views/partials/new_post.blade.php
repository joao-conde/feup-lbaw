<div class="jumbotron p-2 post mb-2" id="newpost">
    <div class="row ">
            <!-- justify-content-between -->
        <div class="col-auto mx-2 ">
            <img src="{{ Auth::user()->getProfilePicturePath() }}" class="profile_img_chat ">
        </div>
        <textarea name="text" placeholder="New post" class="col align-self-center text-primary form-control-sm border border-secondary mr-3"
             id="new_post_ta" style="height: 30px;"></textarea>
             
    </div>

    <div class=" row justify-content-end mt-2" id="btns" role="group">
        <div class="btn-group col-auto">
            <!-- <div class="row justify-content-center"> -->
                <button type="button" class="btn btn-light ">
                    <i class="far fa-image"></i>
                </button>
                <button type="button" class="btn btn-light ">
                    <i class="fas fa-film"></i>
                </button>
                <button type="button" class="btn btn-light ">
                    <i class="fas fa-music"></i>
                </button>
                <div class="ml-2" id="postbutton">
                    <input type="submit" value="post" class="btn btn-primary btn pull-right justify-content-end">
                </div>
            <!-- </div> -->
            <!-- <div class="row justify-content-center" > -->
            <!-- </div> -->
        </div>

    </div>


</div>