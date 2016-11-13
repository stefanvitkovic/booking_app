$(document).ready(function(){

	$('#send').click(function(event){
	  event.preventDefault();

	var checkIn = $("#check_in").val();
	var checkOut = $("#check_out").val();
	// console.log(checkIn + ' ' + checkOut);

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
	  type: 'post',
	  url: "/",
	  data: {check_in:checkIn,check_out:checkOut},
	  success: function(data){
	  	$('#div').removeClass('alert alert-danger');
	  	$('#div').addClass('alert alert-success');
	  	$('#message').text('Please check your email and confirm reservation !');
	    console.log('prosao');
	  },error:function(){
	  	$('#div').removeClass('alert alert-succes');
	  	$('#div').addClass('alert alert-danger');
	  	$('#message').text('Error');
	    console.log('error!');
	  }
	  });
	});

});