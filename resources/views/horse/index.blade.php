@foreach ($horses as $horse)
  <a href="{{route('horse.edit',$horse)}}">{{$horse->name}} {{$horse->runs}}</a>
  <form method="POST" action="{{route('horse.destroy', $horse)}}">
    @csrf
    <button type="submit">DELETE</button>
   </form>
   <br>
@endforeach
