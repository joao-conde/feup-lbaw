<div class="jumbotron p-3 post mb-2">

    <div class="d-none" id="postID">{{$post->id}}</div>

    <div>
        @if($post->creatorid == Auth::user()->id)
        <span id="delete_post_button">
            <i class="clickable fas fa-trash-alt"></i>
        </span>
        <span id="edit_post_button">
            <i class="clickable fas fa-pencil-alt"></i>
        </span>
        @endif
    </div>

    <div class="row mb-3 justify-content-between">

        <div class="col">
            <img src="{{ User::getUserProfilePicturePath($post->creatorid) }}" class="profile mr-2 profile_pic_post">
            @if($post->postbandid != null)
            <img src="{{ Band::getBandIconPicturePath($post->postbandid) }}" class="profile mr-2 band_img_post">
            @endif
            <a class="text-secondary align-middle" href="/users/{{$post->creatorid}}">{{$post->postername}}</a>
        </div>

        
        
        <div class="col-4 text-right">
            <small>
                <i class="text-secondary">{{date('d/m/Y H:i:s',strtotime($post->date))}}</i>
            </small>
        </div>

        

    </div>

    <div class="row justify-content-start">

        <div class="col align-self-center text-justify">

            <small id="text">{{$post->posttext}}
            </small>

        </div>

    </div>

    <div id="comments_list" class="p-2 pl-4 mt-3">

        @foreach($post->comments as $comment)
            @include('partials.comment')
        @endforeach


    </div>



    <form class="form-inline row justify-content-between px-3 pt-2">
        <textarea placeholder="new comment" class="col-9 col-sm-10 col-md-9 col-lg-10 text-primary form-control-sm border border-secondary"
            rows="2" class="new_comment_ta"></textarea>
        <input type="submit" value="comment" class="btn btn-primary btn-sm">
    </form>

</div>