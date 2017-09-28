<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')

<div class="maincontainer">

	<div class ="filtercontrol">

		<table style="margin:auto">
			<form method="get" action="/known_configs/filtered">
			<tr>
				<td>Filter:</td>
				<td>CPU</td>
				<td>
						<select name="filter_cpu">
							<option value="none">None</option>
							@include('menus.cpus')
						</select>
				<td>Host GPU</td>
				<td>
						<select name="filter_host_gpu">
							<option value="none">None</option>
							@include('menus.gpus')
						</select>
				</td>
				<td>Distrobution</td>
				<td>
						<select name="filter_distro">
							<option value="none">None</option>
							@include('menus.distros')
						</select>
				</td>
				<td>
					<input type="submit" value="Search"/>
			</form>
				<td><button id="modal_open">New Configuration</button></td>
			</tr>
		</table>
	</div>

<div class="resultscontrol">
	<div style="padding:15px;">
<table style="margin:auto">
		<tr>
			<td>Motherboard</td>
			<td>CPU</td>
			<td>GPU A</td>
			<td>GPU B</td>
			<td>Distro</td>
			<td>Version</td>
			<td>Kernel</td>
			<td>Notes</td>
			<td/>
		</tr>
		@foreach ($configs as $config)
      <tr>
				<td>{{$config->mobo}}</td>
				<td>{{$config->cpu}}</td>
				<td>{{$config->host_gpu}}</td>
				<td>{{$config->gpu_b}}</td>
			  <td>{{$config->name}}</td>
				<td>{{$config->distro_version}}</td>
			  <td>{{$config->kernel}}</td>
				<td>{{$config->notes}}</td>
				<td><form action="{{ route('known_configs', $config->id) }}" method="get">
							<input type="submit" value="Details"/>
							<input type="hidden" value="{{$config->id}}" name="config_id"/>
							{{ csrf_field() }}
				    </form>
				</td>
			</tr>
		@endforeach
	</table>
</div>
</div>

<!--This table is for entering all the information needed for a new entry..
		Prolly will need to be put inside a div properly and shiz-->
<div class="modal_box" id="add_form">
	<div class="modal_content">
		<h3>Add new configuration</h3>
		<form action="/known_configs/" method="post">
		<table>
			<tr>
				<td>Motherboard:</td>
				<td><select name="mobo_select">
					@foreach ($mobos as $mobo)
						<option value="{{$mobo->id}}">{{$mobo->name}} {{$mobo->easy_name}} {{$mobo->model}}</option>
					@endforeach
				</select>
				</td>
			</tr>
		<!--	<tr>
				<td>Ram:</td>
				<td/>
			</tr> -->
			<tr>
				<td>CPU:</td>
				<td>
					<select name="cpu_select">
						@include('menus.cpus')
					</select>
				</td>
			</tr>
			<tr>
				<td>GPU A:</td>
				<td><select name="gpu_a_select">
					@include('menus.gpus')
				</select>
				</td>
			</tr>
			<tr>
				<td>GPU B:</td>
				<td><select name="gpu_b_select">
					@foreach ($gpus as $gpu)
						<option value="{{$gpu->id}}">{{$gpu->name}} {{$gpu->easy_name}} {{$gpu->model}}</option>
					@endforeach
				</select>
				</td>
			</tr>
			<tr>
				<td>Distro:</td>
				<td><select name="distro_select">
						@include('menus.distros')
				</select>
				</td>
			</tr>
			<tr>
				<td>Version:</td>
				<td><input type="text" name="distro_version"/>
			</tr>
			<tr>
				<td>Kernel:</td>
					<td><input type="text" name="kernel_version"/>
			</tr>
			<tr>
				<td>Hypervisor:</td>
				<td><select name="hypervisor_select">
							<option value="KVM" selected>KVM</option>
							<option value="Xen">Xen</option>
				</td>
		  </tr>
			<tr>
				<td>Hypervisor version:</td>
					<td><input type="text" name="hypervisor_version"/>
			</tr>
			<tr>
				<td>QEMU Version:</td>
					<td><input type="text" name="qemu_version"/>
			</tr>
			<tr>
				<td>Patches:</td>
				<td><textarea name="patches" maxlength="1024" rows=10 columns=50></textarea></td>
			</tr>
			<tr>
				<td>Other notes:</td>
				<td><textarea name="notes" maxlength="1024" rows=10 columns=50></textarea></td>
			</tr>
			<tr>
				<td>Working?</td>
				<td><input type="checkbox" name="working_checkbox"/></td>
			</tr>
			<tr>
				<td><input type="submit" value="Add"></td>
			</table>
			<input type="hidden" name="post_type" value="new"/>
			{{ csrf_field() }}
		</form>
		</div>
	</div>


</div>

@include('app_part.modal_box_js')

</html>
