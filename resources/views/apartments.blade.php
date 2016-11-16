@extends('layout.master')
@section('content')
<div class='row'>
	<div class='col-md-10'>
	<h2>Apartments</h2>
		<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Price</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($apartments as $apartment)
	      <tr>
	        <td>{{$apartment->id}}</td>
	        <td>{{$apartment->name}}</td>
	        <td>{{$apartment->price}} $</td>
	      </tr>
	    @endforeach
	    </tbody>
	  </table>
	</div>
	</div>
	<div class='row'>
	<div class='col-md-1'>
	<a href="{{url('apartments/create')}}"><button type="button" class="btn btn-primary">Add new</button></a>
	</div>
	</div>
@endsection