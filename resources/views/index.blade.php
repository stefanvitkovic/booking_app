@extends('layout.master')
@section('content')
    <div class='row'><br><br>
      <div class='col-md-4 col-md-offset-3'>
        <form>
          <div class="form-group">
            <label for="check_in">Check In</label>
            <input type="date" class="form-control" id="check_in">
          </div>
          <div class="form-group">
            <label for="check_out">Check Out</label>
            <input type="date" class="form-control" id="check_out">
          </div>
          <div class="form-group">
            <label for="sel">Select apartment:</label>
            <select class="form-control" id="sel">
            <option selected disabled>Choose here</option>
            @foreach($apartments as $apartment)
              <option data-price="{{$apartment->price}}" value="{{$apartment->id}}">{{$apartment->name}} - {{$apartment->price}}$ / per night</option>
            @endforeach
            </select>
          </div>
          <button id='send' type="submit" class="btn btn-default">Submit</button>
        </form><br>
        <div id='div' class='text-center'">
        <p id='message'></p>
        </div>
      </div>
      <br>
        <div class='col-md-2'>
          <div class="panel panel-default" id='hide'>
            <div class="panel-body">
              <h4 id='response'>Price : </h4>
            </div>
          </div>
        </div>
    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
@endsection    
