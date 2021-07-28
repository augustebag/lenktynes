@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
       <div class="card-header">Horses</div>
      
        @foreach ($horses as $horse)
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">
              <div class="list-container">
                <div class="list-container__content">
               {{-- <img class="card-img-top" src="..." alt="Card image cap"> --}}
                  <span class="list-container__content__horse">Name: {{$horse->name}}<br> Runs: {{$horse->runs}}<br> Wins: {{$horse->wins}}<br></span>
                  <span class="card-text"> About: {{$horse->about}} </span>
                    <form method="POST" action="{{route('horse.destroy', [$horse])}}">
                      <a href="{{route('horse.edit',$horse)}}" class="btn btn-outline-dark btn-sm">Edit</a>
                      <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>                      
                      @csrf
                    </form>
                </div>
              </div>
            </div>
          </li>
            @endforeach
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('title') Horses @endsection