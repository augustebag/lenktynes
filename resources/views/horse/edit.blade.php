<form method="POST" action="{{route('horse.update',$horse)}}">
    Name: <input type="text" name="horse_name" value="{{$horse->name}}">
    Runs: <input type="text" name="horse_runs" value="{{$horse->runs}}">
    Wins: <input type="text" name="horse_wins" value="{{$horse->wins}}">
    Runs: <textarea type="text" name="horse_about" value="{{$horse->about}}"></textarea>
    @csrf
    <button type="submit">EDIT</button>
 </form>
 