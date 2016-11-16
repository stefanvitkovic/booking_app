$(document).ready(function(){
	$('#hide').hide();

	$('form').change(function(){
		var checkIn = $("#check_in").val();
		var checkOut = $("#check_out").val();
		var apartment_val = $('#sel').val();

		if(checkIn.length && checkOut.length && apartment_val.length > 0){
			console.log(checkIn+" "+checkOut+" "+apartment_val);
			
		$.ajaxSetup({
		  headers: {
		   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});

		$.ajax({
		  type: 'post',
		  url: "check",
		  data: {check_in:checkIn,check_out:checkOut,apartment_id:apartment_val},
		  success: function(data){
		  	$('#hide').show('fast').css('background','#b3e0ff');
		    $('#response').text(data);
		  },error:function(){
		    console.log('error');
		  }
		  });
		}
	});

	$('#send').click(function(event){
	  event.preventDefault();

	var checkIn = $("#check_in").val();
	var checkOut = $("#check_out").val();
	var apartment_val = $('#sel').val();

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
	  	$('#div').addClass('alert alert-info');
	  	$('#message').text('Please check your email and confirm reservation !');
	    console.log(data);
	  },error:function(){
	  	$('#div').removeClass('alert alert-info');
	  	$('#div').addClass('alert alert-danger');
	  	$('#message').text('Room is not available');
	    console.log('error');
	  }
	  });
	});

});