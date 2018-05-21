<div class="user_skill">
    <p class="mr-2 have_it d-inline skillName">{{$skill->skill}}</p>

    @for($i = 0; $i < 5 ; $i++)

        @if($i < $skill->level)
            <span class="mt-1 text-primary fullstar"><i class="fas fa-star"></i></span>
            <span class="mt-1 text-primary emptystar d-none"><i class="far fa-star"></i></span>
            <span class="d-none level">{{$i}}</span>
        @else
            <span class="mt-1 text-primary fullstar d-none"><i class="fas fa-star"></i></span>
            <span class="mt-1 text-primary emptystar"><i class="far fa-star"></i></span>
            <span class="d-none level">{{$i}}</span>
        @endif

    @endfor

    <small class="d-none user_skill_id">{{$skill->skillid}}</small>
    <small class="d-none user_skill_level">{{$skill->level}}</small>
    
    @if($user->id == Auth::user()->id)
        <span class="d-none edit_field delete_skill_button">
            <i class="fas fa-times text-danger"></i>
        </span>
    @endif
</div>