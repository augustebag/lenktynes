@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Horse</div>

               <div class="card-body">

                <form method="POST" action="{{route('horse.store')}}">
                    Name: <input type="text" name="horse_name">
                    Runs: <input type="text" name="horse_runs">
                    Wins: <input type="text" name="horse_wins">
                    About: <textarea type="text" name="horse_about"></textarea>
                    @csrf
                    <button type="submit" class="btn btn-light">ADD</button>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
