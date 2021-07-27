@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Betters</div>

               <div class="card-body">
                <ul class="list-group">
                  @foreach ($betters as $better)
                  <li class="list-group-item">
                    <div class="list-container">
                        <div class="list-container__content">
                          <span class="list-container__content__better">{{$better->name}} Pavarde: {{$better->surname}}</span>
                            <span class="list-container__content__horse">{{$better->betterHorse->name}} {{$better->betterHorse->surname}}</span>
                        </div>
                        </div>
                        <div class="list-container__buttons">
                          <a href="{{route('better.edit',[$better])}}">{{$better->name}} {{$better->betterHorse->name}} {{$better->betterHorse->runs}}</a>
                          <form method="POST" action="{{route('better.destroy', [$better])}}">
                          @csrf
                          <button type="submit" class="btn btn-danger">DELETE</button>
                          </form>
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
