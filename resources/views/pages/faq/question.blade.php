{{-- <div class="card mb-1 bg-primary border-0">

    <button class="btn btn-link text-secondary text-left font-weight-bold" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">How do I create an account?</h5>
        </div>
    </button>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
        <div class="card-body bg-white">
            Head to the 
            <a href="/">login</a>
             page and click "Here" on "Do not have account? Register Here!". Or just click 
            <a href="/register">here</a>
              to jump to the register page.
        </div>
    </div>
</div>
<br> --}}

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