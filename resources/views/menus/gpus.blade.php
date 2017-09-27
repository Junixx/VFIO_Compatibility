@foreach ($gpus as $gpu)
  <option value="{{$gpu->id}}">{{$gpu->name}} {{$gpu->easy_name}} {{$gpu->model}}</option>
@endforeach
