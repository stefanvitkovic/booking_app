@extends('layout.master')
@section('content')
<div class='row'>
<div class='col-md-5'>
<div class="media">
  <div class="media-left media-middle">
    <a href="#">
      <img class="media-object" src="http://www.daughtryfan.com/wp-content/uploads/2016/10/lovely-simple-apartment-inside-apartments-minimalist-kitchen-and-sitting-images-of-fresh-in-decor-2016-simple-apartment-inside.jpg" alt="{{$apartment->name}}" width="64px" height="64px">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{$apartment->name}}</h4>
    <p>Price per night : {{$apartment->price}}</p>
  </div>
</div>
</div>
</div>
@endsection