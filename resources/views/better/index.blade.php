@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Betters</div>

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
                            <a href="{{route('better.edit',[$better])}}" class="btn btn-outline-dark btn-sm">Edit</a>
                          <button type="submit" class="btn btn-outline-danger btn-sm">DELETE</button>
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