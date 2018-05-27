<div class="row justify-content-between mb-1" style="margin: 0 32%;">
    <img src="{{ User::getUserProfilePicturePath($id) }}" class="profile_img_feed">
    <a href="{{ route('profile', ['id' => $id])}}" class="col text-left" target="_blank">
        <small class="text-white">{{ $name }}</small>
    </a>
    <small class="col-auto align-self-center">
        <i class="fas fa-times cross_btn text-white"></i>
    </small>
</div>