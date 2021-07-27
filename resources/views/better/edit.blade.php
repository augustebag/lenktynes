@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                    <form method="POST" action="{{route('better.update',[$better])}}">
                        Name: <input type="text" name="better_name" value="{{$better->name}}">
                        Surname: <input type="text" name="better_surname" value="{{$better->surname}}">
                        Bet: <input type="text" name="better_bet" value="{{$better->bet}}">
                        <select name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" @if($horse->id == $better->horse_id) selected @endif>
                                    {{$horse->name}} {{$horse->surname}}
                                </option>
                            @endforeach
                    </select>
                        @csrf
                        <button type="submit" class="btn btn-light">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
              
