@foreach ($betters as $better)
  <a href="{{route('better.edit',[$better])}}">{{$better->name}} {{$better->surname}}</a>
  <form method="POST" action="{{route('better.destroy', [$better])}}">
   @csrf
   <button type="submit">DELETE</button>
  </form>
  <br>
@endforeach
