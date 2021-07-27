@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Horses</div>

               <div class="card-body">
                  @foreach ($horses as $horse)
                    <a href="{{route('horse.edit',$horse)}}">{{$horse->name}} {{$horse->runs}}</a>
                    <form method="POST" action="{{route('horse.destroy', $horse)}}">
                      @csrf
                      <button type="submit" class="btn btn-warning">DELETE</button>
                    </form>
                    <br>
                  @endforeach
                </div>
              </div>
          </div>
      </div>
    </div>
@endsection

