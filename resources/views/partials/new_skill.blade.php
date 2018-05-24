<div class="row justify-content-between mb-2">
<small class="d-inline px-3 col align-self-center skillName">{{$skill->skill}}</small>
<small class="d-none px-3 col align-self-center skillId">{{$skill->skillid}}</small>
    <div class="stars d-inline px-3">
        @for($i = 0; $i < 5; $i++)
            <span class="mt-1 text-primary fullstar clickable d-none"><i class="fas fa-star"></i></span>
            <span class="mt-1 text-primary emptystar clickable"><i class="far fa-star"></i></span>
            <span class="d-none level">{{$i}}</span>
        @endfor
    </div>
</div>