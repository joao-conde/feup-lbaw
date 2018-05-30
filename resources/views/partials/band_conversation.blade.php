    <div class="chat_dropdown row ml-2 justify-content-between pr-4" data-toggle="collapse" href="{{"#band".$band->id}}" role="button"
        aria-expanded="false" aria-controls="chatWindow">
        <div class="col">
            <img src="{{ Band::getBandIconPicturePath($band->id) }}" class="mr-2 profile_img_chat">
            <small class="text-secondary">{{$band->name}}</small>

        </div>
        <div class="col-2">
            <span class="badge badge-primary align-middle">4</span>
        </div>
    </div>

    <div class="collapse" id="{{"band".$band->id}}">
        <div class="card card-body rounded-0 p-0 m-0 chats">
            <div class="container">
                <div class="row my-2">
                    <div class="col-auto px-2">
                        <a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
                            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
                        </a>

                    </div>
                    <div class="col px-0">
                        <small>What is the meaning of life?</small>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-auto px-2">
                        <a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
                            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
                        </a>

                    </div>
                    <div class="col px-0">
                        <small>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec ultrices sollicitudin
                            est, eu rhoncus tellus fermentum quis.</small>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-auto px-2">
                        <a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
                            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
                        </a>

                    </div>
                    <div class="col px-0">
                        <small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec
                            ultrices sollicitudin est, eu rhoncus tellus fermentum quis.</small>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-auto px-2">
                        <a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
                            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
                        </a>

                    </div>
                    <div class="col px-0">
                        <small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec
                            ultrices sollicitudin est, eu rhoncus tellus fermentum quis.</small>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-auto px-2">
                        <a href="#" data-toggle="tooltip" title="16:33" data-placement="left">
                            <img src="{{ asset('images/system/dummy_profile.svg') }}" class="profile_img_chat_window">
                        </a>

                    </div>
                    <div class="col px-0">
                        <small>Ok, good bye! Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sed augue massa. Donec
                            ultrices sollicitudin est, eu rhoncus tellus fermentum quis.</small>
                    </div>
                </div>

            </div>
        </div>

        <div class="container">
            <form class="row form-inline">
                <img src="{{ Auth::user()->getProfilePicturePath() }}" class="m-2 profile_img_chat">
                <textarea class="col not_resizable form-control mr-1" name="Chat message" id="chat_msg1" cols="25" rows="1"></textarea>
                <button type="submit" class="col-auto form-control btn btn-sm btn-primary">
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>

    </div>