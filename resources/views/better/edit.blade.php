@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                    <form method="POST" action="{{route('better.update',[$better])}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="better_name" value="{{$better->name}}">
                            <small class="form-text text-muted">Name.</small>
                          </div>

                          <div class="form-group">
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="better_surname" value="{{$better->surname}}">
                            <small class="form-text text-muted">Surname.</small>
                          </div>

                          <div class="form-group">
                            <label>Bet:</label>
                            <input type="text" class="form-control" name="better_bet" value="{{$better->bet}}">
                            <small class="form-text text-muted">Bet.</small>
                          </div>

                        <select name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}" @if($horse->id == $better->horse_id) selected @endif>
                                    {{$horse->name}} {{$horse->surname}}
                                </option>
                            @endforeach
                    </select>
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-sm">EDIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
              