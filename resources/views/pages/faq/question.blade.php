<div class="card mb-1 bg-primary border-0">

    <button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapse{{$id}}" aria-expanded="false" aria-controls="collapseOne">
        <div class="card-header" id="heading{{$id}}">
            <h5 class="mb-0">{{ $question }} </h5>
        </div>
    </button>

    <div id="collapse{{$id}}" class="collapse" aria-labelledby="heading{{$id}}" data-parent="#accordion">
        <div class="card-body bg-white">
            {!! $answer !!}
        </div>
    </div>
</div>
<br>