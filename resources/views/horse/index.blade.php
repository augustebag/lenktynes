@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
       <div class="card-header">
         <h2>Horses</h2>

       <form action="{{route('horse.index')}}" method="get" class="sort-form">
        <fieldset>
            <legend>Sort by: </legend>
            <div>
              <label>Name </label>
              <input type="radio" name="sort_by" value="name" @if('name'==$sort) checked @endif>
            </div>
            <div>
              <label>Runs </label>
              <input type="radio" name="sort_by" value="runs" @if('runs'==$sort) checked @endif>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-outline-dark btn-sm">Sort</button>
        <a href="{{route('horse.index')}}" class="btn btn-outline-danger btn-sm">Clear</a>
    </form>
    <form action="{{route('horse.index')}}" method="get" class="sort-form">
      <fieldset>
          <legend>Search: </legend>
          <div class="form-group">
              <input type="search" class="form-control mr-sm-2" placeholder="Search" aria-label="Search" name="s">
          </div>
      </fieldset>
      <button class="btn btn-sm btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
  </form>
    </div>
  </div>
      

    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">Photo</th>
          <th scope="col">Name</th>
          <th scope="col">Runs</th>
          <th scope="col">Wins</th>
          <th scope="col">*</th>
            </tr>
      </thead>
      <tbody>
        @foreach ($horses as $horse)
        <tr>
          <td class="list-container__photo"{{$horse->photo}}>
            @if($horse->photo)
            <img src="{{$horse->photo}}">
            @else
          <img src="{{asset('no-img.png')}}">
          @endif
          </td>
          <td>{{$horse->name}}</td>
          <td>{{$horse->runs}}</td>
          <td>{{$horse->wins}}</td>
          <td class="list-container__buttons">
                    <form method="POST" action="{{route('better.destroy', [$horse])}}">
                      @csrf
                      <a href="{{route('horse.show',[$horse])}}" class="btn btn-outline-dark btn-sm">More info</a>
                      <a href="{{route('horse.edit',[$horse])}}" class="btn btn-outline-dark btn-sm">Edit</a>
                      <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
                    </form>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            {{$horses->links()}}
        </div>
      </div>
    </div>
  @endsection
  @section('title') Horses @endsection