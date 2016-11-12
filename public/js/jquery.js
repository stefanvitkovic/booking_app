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
	    console.log(data);
	  },error:function(){
	    console.log('error!');
	  }
	  });
	});

});