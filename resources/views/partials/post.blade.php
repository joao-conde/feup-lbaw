<div class="jumbotron p-3 post mb-2">

    <div class="row mb-3 justify-content-between">

        <div class="col">
            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">{{$post->name}}</a>
        </div>

        <div class="col-4 text-right">
            <small>
                <i class="text-secondary">{{$post->date}}</i>
            </small>
        </div>

    </div>

    <div class="row justify-content-start">

        <div class="col align-self-center text-justify">

            <small>{{$post->text}}
            </small>

        </div>

    </div>

    <div class="row comment mb-1">

    <div class="col align-self-center">

        <div class="row">

            <div class="col-auto comment_author">
                <img src="{{ asset('images/system/dummy_profile.svg') }}" class=" profile_img_message mr-2">
                <small>
                    <a class="text-secondary align-middle" href="#">Leo</a>
                </small>
            </div>

            <div class="col">
                <small class="comment_text">
                    <small>
                        <sup>
                            <i class="fas fa-quote-right"></i>
                        </sup>
                        <i>Nice</i>
                    </small>
                </small>
            </div>
        </div>

    </div>

</div>

</div>