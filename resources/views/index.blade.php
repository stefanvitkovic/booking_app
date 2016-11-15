<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>reservation app</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class='container'>
    <div class='row'><br><br>
      <div class='col-md-6 col-md-offset-3'>
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
              <option value="{{$apartment->id}}">{{$apartment->name}} - {{$apartment->price}}$ / per night</option>
            @endforeach
            </select>
          </div>
          <button id='send' type="submit" class="btn btn-default">Submit</button>
        </form><br>
        <div id='div' class='text-center'">
        <p id='message'></p>
        </div>
      </div>
    </div>
  </div>

    <!-- jQuery -->
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    
  </body>
</html>