<div class="jumbotron p-3 post mb-2">

    <div class="row mb-3 justify-content-between">

        <div class="col">
            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile mr-2">
            <a class="text-secondary align-middle" href="#">{{$post->id}}</a>
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

</div>