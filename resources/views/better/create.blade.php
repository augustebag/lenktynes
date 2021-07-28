@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Better</div>

               <div class="card-body">
                    <form method="POST" action="{{route('better.store')}}">
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" class="form-control" name="better_name">
                            <small class="form-text text-muted">Name.</small>
                          </div>

                          <div class="form-group">
                            <label>Surname:</label>
                            <input type="text" class="form-control" name="better_surname">
                            <small class="form-text text-muted">Surname.</small>
                          </div>

                          <div class="form-group">
                            <label>Bet:</label>
                            <input type="text" class="form-control" name="better_bet">
                            <small class="form-text text-muted">Bet.</small>
                          </div>
                        

                        <select name="horse_id">
                            @foreach ($horses as $horse)
                                <option value="{{$horse->id}}">{{$horse->name}}</option>
                            @endforeach
                    </select>
                        @csrf
                        <button type="submit" class="btn btn-outline-dark btn-sm">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
          