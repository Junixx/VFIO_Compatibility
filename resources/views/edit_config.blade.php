<html>
<link rel="stylesheet" type="text/css" href="/css/containers.css">

@include('app_part.banner')

<div class="maincontainer">
	<form action="/known_configs/" method="post">
	<table style="margin:auto;margin-top:20px;">
		<tr>
			<td>Motherboard:</td>
			<td><select name="mobo_select" selected="{{$config->mobo_id}}">
				@foreach ($mobos as $mobo)
					<option <?php if ($mobo->id == $config->mobo_id) { echo "selected";} ?> value="{{$mobo->id}}">{{$mobo->name}} {{$mobo->easy_name}} {{$mobo->model}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>Ram:</td>
			<td/>
		</tr>
		<tr>
			<td>CPU:</td>
			<td><select name="cpu_select">
				@foreach ($cpus as $cpu)
					<option <?php if ($cpu->id == $config->cpu_id) { echo "selected";} ?> value="{{$cpu->id}}">{{$cpu->name}} {{$cpu->easy_name}} {{$cpu->model}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>GPU A:</td>
			<td><select name="gpu_a_select">
				@foreach ($gpus as $gpu)
					<option <?php if ($gpu->id == $config->host_gpu_id) { echo "selected";} ?> value="{{$gpu->id}}">{{$gpu->name}} {{$gpu->easy_name}} {{$gpu->model}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>GPU B:</td>
			<td><select name="gpu_b_select">
				@foreach ($gpus as $gpu)
					<option <?php if ($gpu->id == $config->pass_gpu_1_id) { echo "selected";} ?> value="{{$gpu->id}}">{{$gpu->name}} {{$gpu->easy_name}} {{$gpu->model}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>Distro:</td>
			<td><select name="distro_select">
				@foreach ($distros as $distro)
					<option <?php if ($distro->id == $config->distro_id) { echo "selected";} ?> value="{{$distro->id}}">{{$distro->name}}</option>
				@endforeach
			</select>
			</td>
		</tr>
		<tr>
			<td>Version:</td>
			<td><input type="text" name="distro_version" value="{{$config->distro_version}}"/>
		</tr>
		<tr>
			<td>Kernel:</td>
				<td><input type="text" name="kernel_version" value="{{$config->kernel}}"/>
		</tr>
		<tr>
			<td>Hypervisor:</td>
			<td><select name="hypervisor_select">
						<option value="KVM" <?php if ($config->hypervisor == "KVM") { echo "selected";} ?> >KVM</option>
						<option value="Xen" <?php if ($config->hypervisor == "Xen") { echo "selected";} ?> >Xen</option>
			</td>
	  </tr>
		<tr>
			<td>Hypervisor version:</td>
				<td><input type="text" name="hypervisor_version" value="{{$config->hypervisor_version}}"/>
		</tr>
		<tr>
			<td>QEMU Version:</td>
				<td><input type="text" name="qemu_version" value="{{$config->qemu_version}}" />
		</tr>
		<tr>
			<td>Patches:</td>
			<td><textarea name="patches" rows=5>{{$config->patches}}</textarea></td>
		</tr>
		<tr>
			<td>Other notes:</td>
			<td><textarea name="notes" rows=5>{{$config->notes}}</textarea></td>
		</tr>
		<tr>
			<td>Working?</td>
			<td><input type="checkbox" name="working_checkbox" <?php if ($config->working == 1){ echo "checked"; } ?>/></td>
		</tr>
		<tr>
			<td><input type="submit" value="Update"></td>
			<input type="hidden" name="post_type" value="update"/>
			<input type="hidden" name="config_id" value="{{$config->id}}"/>
			{{ csrf_field() }}
			</form>
			<form  action="/known_configs/" method="post">
				<input type="hidden" name="post_type" value="delete"/>
				<input type="hidden" name="config_id" value="{{$config->id}}"/>
				<td style="text-align:right"><input type="submit" value="Delete"></td>
				{{ csrf_field() }}
			</form>
		</table>



</div>

</html>
