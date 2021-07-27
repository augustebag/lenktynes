@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Horses</div>

               <div class="card-body">
                <ul class="list-group">
                  @foreach ($horses as $horse)
                  <li class="list-group-item">
                    <div class="list-container">
                        <div class="list-container__content">
                        </div>
                        <div class="list-container__buttons">

                    <a href="{{route('horse.edit',$horse)}}">{{$horse->name}} {{$horse->runs}}</a>
                    <form method="POST" action="{{route('horse.destroy', $horse)}}">
                      @csrf
                      <button type="submit" class="btn btn-danger">DELETE</button>
                    </form>
                  </div>
                </div>
               </li>
               @endforeach
             </div>
           </div>
        </div>
      </div>
    </div>
@endsection

