@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
       <div class="card-header">
         <h2>Horses</h2>
       <form action="{{route('horse.index')}}" method="get" class="sort-form">
        <fieldset>
            <legend>Sort by: </legend>
            <div>
            <label>Name </label><input type="radio" name="sort_by" value="name" checked>
            </div>
            <div>
            <label>Runs </label><input type="radio" name="sort_by" value="runs">
            </div>
        </fieldset>
        <fieldset>
            <legend>Direction: </legend>
            <div>
            <label>Up </label><input type="radio" name="dir" value="esc" checked>
            </div>
            <div>
            <label>Down </label><input type="radio" name="dir" value="desc">
            </div>
        </fieldset>
        <button type="submit" class="btn btn-outline-dark btn-sm">Sort</button>
        <a href="{{route('horse.index')}}" class="btn btn-outline-danger btn-sm">Clear</a>
    </form>
    </div>
      
        @foreach ($horses as $horse)
        <div class="card-body">
          <ul class="list-group">
            <li class="list-group-item">
              <div class="list-container">
                <div class="list-container__content">
                  <div class="list-container__photo">
                  @if($horse->photo)
                    <img src="{{$horse->photo}}">
                    @else
                  <img src="{{asset('no-img.png')}}">
                  @endif
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
            </div>
          </li>
            @endforeach
            {{$horses->links()}}
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('title') Horses @endsection