<div class="row comment mb-2">

    <div class="col align-self-center">

        <div class="row">

            <div class="commentDate col-auto align-self-center pr-0">
                <small>{{date('d/m/Y H:i',strtotime($comment->date))}}</small>
            </div>

            <div class="col-auto align-self-center comment_author">
                <img src="{{ User::getUserProfilePicturePath($comment->userid) }}" class=" profile_img_message mr-2">
                <small>
                    <a class="text-secondary align-middle" href="/users/{{$comment->userid}}">{{$comment->author}}</a>
                    <span>:</span>
                </small>
            </div>

            <div class="col align-self-center">
                <small class="comment_text">
                    <small>
                        <sup>
                            <i class="fas fa-quote-right"></i>
                        </sup>
                        <i>{{$comment->text}}</i>
                    </small>
                </small>
            </div>
        </div>

    </div>

</div>