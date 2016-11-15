<h2>Apartments :</h2>
<ul>
	@foreach($apartments as $apartment)
		<li>{{$apartment->name}}</li>
	@endforeach
</ul>