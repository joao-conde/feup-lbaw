<div class="jumbotron p-3 post mb-2">

    <div class="d-none postID">{{$post->id}}</div>

    <div class="row mb-3 justify-content-between">

        <div class="col">
            <img src="{{ User::getUserProfilePicturePath($post->creatorid) }}" class="profile mr-2 profile_pic_post"> @if($post->postbandid != null)
            <img src="{{ Band::getBandIconPicturePath($post->postbandid) }}" class="profile mr-2 band_img_post">
            <a class=" mr-2 text-secondary align-middle" href="/bands/{{$post->postbandid}}">{{Band::getBandName($post->postbandid)}}</a>
            <small>
                <a class="text-secondary align-middle mr-2" href="/users/{{$post->creatorid}}">
                    <i>({{$post->postername}})</i>
                </a>
            </small>
            @if($post->private == true)
            <span id="lock_locked" class="">
                <i class="fas fa-lock text-primary"></i>
            </span>
            @endif @else
            <a class="text-secondary align-middle" href="/users/{{$post->creatorid}}">{{$post->postername}}</a>

            @endif
        </div>



        <div class="col-4 text-right">
            <small>
                <i class="text-secondary">{{date('d/m/Y H:i:s',strtotime($post->date))}}</i>
            </small>
            <span class="p-2 clickable text-secondary" data-toggle="dropdown" id="moreOption" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v"></i>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreOption">
                    @if($post->creatorid == Auth::user()->id)
                    <span class="dropdown-item clickable delete_post_button">
                        <i class=" mr-2 clickable fas fa-trash-alt"></i>
                        <small>Remove Post</small>
                    </span>
                    <span class=" dropdown-item clickable edit_post_button">
                        <i class="mr-2 fas fa-pencil-alt"></i>
                        <small>Edit Post</small>
                    </span>
                    @else
                    <span class="dropdown-item clickable report_button">
                            <i class="mr-3 ml-1 fas fa-exclamation"></i>
                            <small>Report Content</small>
                    </span>
                    @endif
                </div>
            </span>
        </div>
    </div>

    <div class="row">

        <div class="col">

            <div class="post_body">
                @if($post->posttext == "")
                <small class="d-none text">{{$post->posttext}}</small>
                @else
                <div class="px-2">
                    <small class=" text">{{$post->posttext}}</small>
                </div>
                @endif
                <textarea class="editPostTextArea d-none w-100"></textarea>
                <span class="clickable confirm_edit_post_button d-none">
                    <i class="fas fa-check text-success"></i>
                </span>
                <span class="clickable cancel_edit_post_button d-none">
                    <i class="fas fa-times text-danger"></i>
                </span>
                @if($post->mediaurl != "")
                <hr class="mx-2">
                <iframe class="px-2 mt-2 w-100" height="315" src="{{$post->mediaurl}}" frameborder="0" allow="autoplay; encrypted-media"
                    allowfullscreen></iframe>
                @endif

            </div>


        </div>

    </div>

    <hr>

    <div class="comments_list" class="p-2 pl-4 mt-3">

        @foreach($post->comments as $comment) @include('partials.comment') @endforeach
    </div>

    <form class="form-inline row justify-content-between px-3 pt-2">
        <textarea placeholder="new comment" class="new_comment_ta not_resizable col-9 col-sm-10 col-md-9 col-lg-10 text-primary form-control-sm border border-secondary"
            rows="2"></textarea>
        <input type="submit" disabled value="comment" class="btn btn-primary btn-sm">
    </form>

</div>