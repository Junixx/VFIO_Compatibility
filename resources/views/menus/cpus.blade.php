@foreach ($cpus as $cpu)
  <option value="{{$cpu->id}}">{{$cpu->name}} {{$cpu->easy_name}} {{$cpu->model}}</option>
@endforeach
