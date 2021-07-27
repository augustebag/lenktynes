@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Betters</div>

               <div class="card-body">
                  @foreach ($betters as $better)
                    <a href="{{route('better.edit',[$better])}}">{{$better->name}} {{$better->betterHorse->name}} {{$better->betterHorse->runs}}</a>
                    <form method="POST" action="{{route('better.destroy', [$better])}}">
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
