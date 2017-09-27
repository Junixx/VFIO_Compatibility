<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')

<div class="maincontainer">
	<div class="leftsubcontrol">
	<table style="float:right">
	@foreach($distros as $distro)
	<form action="/distros/" method="post">
	<tr>
		<td>{{$distro->name}}</td>
		<td><input type="submit" value="Delete"/></td>
	</tr>
	<input type="hidden" value="{{$distro->id}}" name="distro_id"/>
	<input type="hidden" value="delete" name="post_type"/>
	{{ csrf_field() }}
  </form>
	@endforeach
	</table>
	</div>



	<div class="rightsubcontrol">
		<form action="/distros/" method="post">
	 	<table>
				<tr>
					<td>Distro Name</td>
					<td/>
				</tr>
				<tr>
					<td><input type="text" name="distro_name"/></td>
					<td><input type="submit" value="Add"></td>
				</tr>
			</table>
			<input type="hidden" value="new" name="post_type"/>
			{{ csrf_field() }}
		  </form>
		</div>

</div>





</div>

</html>
