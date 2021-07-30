@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h2>Betters</h2>
          <div class="row">
            <form action="{{route('better.index')}}" method="get">
              <fieldset>
                <legend>Sort by: </legend>
                <div>
                  <label>Name </label>
                  <input type="radio" name="sort_by" value="name" @if('name'==$sort) checked @endif>

                  <label>Surname </label>
                  <input type="radio" name="sort_by" value="surname" @if('surname'==$sort) checked @endif>
                </div>
              </fieldset>
              <button type="submit" class="btn btn-sm btn-outline-dark">Sort</button>
              <a href="{{route('better.index')}}" class="btn btn-outline-danger btn-sm">Clear</a>
            </form>
            <form action="{{route('better.index')}}" method="get" class="sort-form">
              <fieldset>
                <legend>Filter by: </legend>
                <select class="horse_id" class="form-control">
                  @foreach($horses as $horse)
                  <option value="{{$horse->id}}" @if($defaultHorse == $horse->id) selected @endif>
                    {{$horse->name}}
                  </option>
                  @endforeach
                </select><br>
              </fieldset>
                <button type="submit" class="btn btn-sm btn-outline-dark filter">Submit</button>
            </form>
            <form action="{{route('better.index')}}" method="get" class="sort-form">
              <fieldset>
                <legend>Search: </legend>
                <input type="search" class="form-control mr-sm-2 search" placeholder="Search" aria-label="Search"
                  name="s">
                <button class="btn btn-sm btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                <a href="{{route('better.index')}}" class="btn btn-sm btn-outline-danger my-2 my-sm-0">Clear</a>
              </fieldset>
            </form>
          </div>
        </div>
      </div>


      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Surname</th>
            <th scope="col">Horse Name</th>
            <th scope="col">Bet</th>
            <th scope="col">*</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($betters as $better)
          <tr>
            <td>{{$better->name}}</td>
            <td>{{$better->surname}}</td>
            <td>{{$better->betterHorse->name}}</td>
            <td>{{$better->bet}}</td>
            <td class="list-container__buttons">
              <form method="POST" action="{{route('better.destroy', [$better])}}">
                @csrf
                <a href="{{route('better.show',[$better])}}" class="btn btn-outline-success btn-sm">More info</a>
                <a href="{{route('better.edit',[$better])}}" class="btn btn-outline-success btn-sm">Edit</a>
                <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$betters->links()}}
    </div>
  </div>
</div>
@endsection
@section('title') Betters @endsection