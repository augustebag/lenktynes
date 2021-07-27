@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                <form method="POST" action="{{route('horse.update',$horse)}}">
                    Name: <input type="text" name="horse_name" value="{{$horse->name}}">
                    Runs: <input type="text" name="horse_runs" value="{{$horse->runs}}">
                    Wins: <input type="text" name="horse_wins" value="{{$horse->wins}}">
                    Runs: <textarea type="text" name="horse_about" value="{{$horse->about}}"></textarea>
                    @csrf
                    <button type="submit" class="btn btn-light">EDIT</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
                