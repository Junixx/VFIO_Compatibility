<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')

<div class="maincontainer">
	<div class="leftsubcontrol">
	<table style="float:right">
	@foreach($vendors as $vendor)
		<form action="/vendors/" method="post">
		<tr>
			<td>{{$vendor->name}}</td>
			<td><input type="submit" value="Delete"/></td>
		</tr>
		<input type="hidden" value="{{$vendor->id}}" name="vendor_id"/>
 	  <input type="hidden" value="delete" name="post_type"/>
		{{ csrf_field() }}
	</form>
	@endforeach
</table>
</div>

<div class="rightsubcontrol">
  <form action="/vendors/" method="post">
 	<table>
			<tr>
				<td>Vendor Name</td>
				<td/>
			</tr>
			<tr>
				<td><input type="text" name="vendor_name"/></td>
				<td><input type="submit" value="Add"></td>
			</tr>
		</table>
		<input type="hidden" value="new" name="post_type"/>
		{{ csrf_field() }}
	  </form>
	</div>
</div>

</html>
