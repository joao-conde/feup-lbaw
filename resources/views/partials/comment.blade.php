<div class="row comment mb-2">
    <p class="d-none commentId">{{$comment->id}}</p>

    <div class="col align-self-center">

        <div class="row">

            <div class="col-1 align-self-center comment_author">
                <a href="/users/{{$comment->userid}}"><img src="{{ User::getUserProfilePicturePath($comment->userid) }}" class=" profile_img_message mr-2"></a>
            </div>

            <div class="col-9 align-self-center">
                <small class="comment_text">
                    <small>
                        <sup>
                            <i class="fas fa-quote-right"></i>
                        </sup>
                    </small>
                        <i>{{$comment->text}}</i>
                </small>
            </div>

            <div class="commentDate col-1 align-self-center pr-0">
                <small>{{date('d/m/Y H:i',strtotime($comment->date))}}</small>
            </div>

            <div class="col">
                <span class="p-2 clickable text-secondary" data-toggle="dropdown" id="moreOption" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreOption">
                        @if($comment->userid == Auth::user()->id)
                        <span class="dropdown-item clickable delete_comment_button">
                            <i class=" mr-2 clickable fas fa-trash-alt"></i>
                            <small>Remove Comment</small>
                        </span>
                        <span class="d-none dropdown-item clickable edit_comment_button">
                            <i class="mr-2 fas fa-pencil-alt"></i>
                            <small>Edit Comment</small>
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
    </div>
</div>