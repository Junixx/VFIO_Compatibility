<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')


<div class="maincontainer">
	<table>
		<form action="/{{$type}}/" method="post">
		<tr><td><input type="text" name="new_value" value="{{$item[0]->name}}"/></td></tr>
		<tr>
			<td>
					<input type="submit" value="Update"/>
					<input type="hidden" value="{{$item[0]->id}}" name="id">
					{{ csrf_field() }}
				</form>
			</td>
			<td>
				<input type="submit" value="Delete"/>
			</td>
		</tr>
	<table>
</div>

</html>
