<div class="row comment mb-1">

    <div class="col align-self-center">

        <div class="row">

            <div class="col-auto comment_author">
                <img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
                <small>
                    <a class="text-secondary align-middle" href="#">{{$comment->name}}</a>
                </small>
            </div>
            <div class="col">
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