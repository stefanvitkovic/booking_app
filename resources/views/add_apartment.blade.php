<form method='POST' action="{{url('apartments')}}">
{{csrf_field()}}
	<input type="text" name="name">
	<input type="text" name="price">
	<input type="submit">
</form>