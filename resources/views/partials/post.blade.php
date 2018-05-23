<div class="jumbotron p-3 post mb-2">

    <div class="row mb-3 justify-content-between">

        <div class="col">
            <img src="{{ User::getUserProfilePicturePath($post->userid) }}" class="profile mr-2 profile_pic_post">
            @if($post->band_post == true)
            <img src="{{ $band->getProfilePicturePath() }}" class="profile mr-2 band_img_post">
            @endif
            <a class="text-secondary align-middle" href="/users/{{$post->userid}}">{{$post->name}}</a>
        </div>

        <div class="col-4 text-right">
            <small>
                <i class="text-secondary">{{date('d/m/Y H:i:s',strtotime($post->date))}}</i>
            </small>
        </div>

    </div>

    <div class="row justify-content-start">

        <div class="col align-self-center text-justify">

            <small>{{$post->text}}
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
            rows="2" id="new_comment_ta"></textarea>
        <input type="submit" value="comment" class="btn btn-primary btn-sm">
    </form>

</div>