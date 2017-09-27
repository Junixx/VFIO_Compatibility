@foreach ($distros as $distro)
  <option value="{{$distro->id}}">{{$distro->name}}</option>
@endforeach
