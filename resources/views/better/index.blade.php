@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">
                 <h2>Betters</h2>

               <form action="{{route('better.index')}}" method="get" class="sort-form">
                <fieldset>
                    <legend>Sort by: </legend>
                    <div>
                    <label>Name </label><input type="radio" name="sort_by" value="name" @if('name'== $sort) checked @endif>
                    </div>
                    <div>
                    <label>Surname </label><input type="radio" name="sort_by" value="surname" @if('surname'== $sort) checked @endif>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Direction: </legend>
                    <div>
                    <label>Up </label><input type="radio" name="dir" value="esc" @if('dir'== $dir) checked @endif>
                    </div>
                    <div>
                    <label>Down </label><input type="radio" name="dir" @if('dir'== $dir) checked @endif>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-outline-dark btn-sm">Sort</button>
                <a href="{{route('better.index')}}" class="btn btn-outline-danger btn-sm">Clear</a>
            </form>

            <form action="{{route('better.index')}}" method="get" class="sort-form">
              <fieldset>
                  <legend>Filter by: </legend>
                  <div class="form-group">
                      <select class="horse_id" class="form-control">
                          @foreach($horses as $horse)
                          <option value="{{$horse->id}}" @if($defaultHorse == $horse->id) selected @endif>
                            {{$horse->name}} {{$horse->bet}}
                          @endforeach
                      </select>
                  </div>
              </fieldset>
              <button type="submit" class="btn btn-primary">Filter</button>
              <a href="{{route('better.index')}}" class="btn btn-danger">Clear</a>

          </form>

            </div>


               @foreach ($betters as $better)
               <div class="card-body">
                <ul class="list-group">
                  <li class="list-group-item">
                    <div class="list-container">
                        <div class="list-container__content">
                          <span class="list-container__content__better">{{$better->name}} {{$better->surname}} <br></span>
                            <span class="list-container__content__horse"> Horse: {{$better->betterHorse->name}}<br> Bet: {{$better->bet}}</span>
                        </div>
                        </div>
                        <div class="list-container__buttons">
                          <form method="POST" action="{{route('better.destroy', [$better])}}">
                            @csrf
                            <a href="{{route('better.show',[$better])}}" class="btn btn-outline-dark btn-sm">More info</a>
                            <a href="{{route('better.edit',[$better])}}" class="btn btn-outline-dark btn-sm">Edit</a>
                          <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
                          </form>
                        </div>
                    </div>
                  </li>
                  @endforeach
                  {{$betters->links()}}
                </ul>
                </div>
              </div>
          </div>
      </div>
    </div>
  @endsection
  @section('title') Betters @endsection