$(document).ready(function(){
	
	$('#send').click(function(event){
	  event.preventDefault();

	var checkIn = $("#check_in").val();
	var checkOut = $("#check_out").val();
	var apartment_val = $('#sel').val();
	// console.log(apartment_val);

	$.ajaxSetup({
	  headers: {
	    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	  }
	});

	$.ajax({
	  type: 'post',
	  url: "/",
	  data: {check_in:checkIn,check_out:checkOut,apartment_id:apartment_val},
	  success: function(data){
	  	$('#div').removeClass('alert alert-danger');
	  	$('#div').addClass('alert alert-success');
	  	$('#message').text('Please check your email and confirm reservation !');
	    console.log(data);
	  },error:function(){
	  	$('#div').removeClass('alert alert-succes');
	  	$('#div').addClass('alert alert-danger');
	  	$('#message').text('Room is not available');
	    console.log('error');
	  }
	  });
	});

});