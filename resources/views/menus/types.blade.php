@foreach ($comp_types as $type)
  <option value="{{$type->id}}">{{$type->type}}</option>
@endforeach
