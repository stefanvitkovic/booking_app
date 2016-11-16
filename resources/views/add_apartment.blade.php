@extends('layout.master')
@section('content')
<div class='row'>
	<div class='col-md-8 col-md-offset-2'>
		<form method='POST' action="{{route('add_ap')}}">
		{{csrf_field()}}
		  <div class="form-group">
		    <label for="name">Name</label>
		    <input type="text" class="form-control" name='name' id="name" placeholder="Name">
		  </div>
		  <div class="form-group">
		    <label for="price">Price</label>
		    <input type="text" class="form-control" name="price" id="price" placeholder="Price">
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		  <a href="{{route('apartments')}}" class="btn btn-default">Back</a>

		</form>
	</div>
</div>
@endsection