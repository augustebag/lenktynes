<form method="POST" action="{{route('horse.store')}}">
    Name: <input type="text" name="horse_name">
    Runs: <input type="text" name="horse_runs">
    Wins: <input type="text" name="horse_wins">
    About: <textarea type="text" name="horse_about"></textarea>
    @csrf
    <button type="submit">ADD</button>
 </form>
 