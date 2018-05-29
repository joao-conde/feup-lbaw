
@if($membership_status == 'pending_invitation')

<div class="btn-group pending_invitation" role="group" aria-label="Invitation">
    <button type="button" class="band_membership_button btn btn-success btn-sm">
        <span class="btn_follow_label">Accept</span>
        <span class="d-none bandId">{{$bandId}}</span>
        <span class="d-none membership_status">{{$membership_status.'_accept'}}</span>
    </button>
    <button type="button" class="band_membership_button btn btn-danger btn-sm">
        <span class="btn_follow_label">Reject</span>
        <span class="d-none bandId">{{$bandId}}</span>
        <span class="d-none membership_status">{{$membership_status.'_reject'}}</span>
    </button>
</div>
@else
<button class="band_membership_button btn btn-sm btn-danger
    {{$membership_status == 'pending_application'? 'pending_application' : 'member'}}"> 
    <span class="btn_follow_label">
        {{$membership_status == 'pending_application'? 'Cancel' : 'Leave Band'}}
    </span>
    <span class="d-none bandId">{{$bandId}}</span>
    <span class="d-none membership_status">{{$membership_status}}</span>
</button>
@endif