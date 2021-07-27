<form method="POST" action="{{route('better.store')}}">
    Name: <input type="text" name="better_name">
    Surname: <input type="text" name="better_surname">
    Bet: <input type="text" name="better_bet">
    <select name="horse_id">
        @foreach ($horses as $horse)
            <option value="{{$horse->id}}">{{$horse->name}} {{$horse->runs}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>
 