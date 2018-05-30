<div class="concert d-block concert_line">
	<div class="d-none concert_id">{{ $concert->id }}</div>
    <small class="text-primary">"{{$concert->description}}"</small>     
    <small>at {{$concert->name}} in</small>
    <small class="text-primary">{{date('d-m-20y',strtotime($concert->concertdate))}}</small>   
    <span id="remove_button"><i class="fas fa-times text-danger ml-3"></i></span>
</div>