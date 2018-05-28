
@if($membership_status == 'pending_invitation')

<div class="btn-group" role="group" aria-label="Invitation">
    <button type="button" class="btn btn-success">Accept</button>
    <button type="button" class="btn btn-danger">Reject</button>
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