@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Better</div>

               <div class="card-body">
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
                        <button type="submit" class="btn btn-light">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
                    