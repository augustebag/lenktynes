@extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{$horse->name}}</div>
               <div class="card-body">
                      <div class="form-group list-container__photo">
                        <label>Photo</label>@if($horse->photo)
                        <img src="{{$horse->photo}}">
                        @else
                      <img src="{{asset('no-img.png')}}">
                      @endif
                      </div>
                      <div class="form-group">
                        <label>Runs</label>
                        <small class="form-text text-muted">{{$horse->runs}}</small>
                      </div>
                      <div class="form-group">
                        <label>Wins</label>
                        <small class="form-text text-muted"> {{$horse->wins}}</small>
                      </div>
                      <div class="form-group">
                        <label>About</label>
                        <small class="form-text text-muted"> {{$horse->about}}</small>
                      </div>
                            <a href="{{route('horse.edit',[$horse])}}" class="btn btn-outline-dark btn-sm">Edit</a>
                      <a href="{{route('horse.pdf',[$horse])}}" class="btn btn-outline-dark btn-sm">PDF</a>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>
    
@endsection

@section('title') Better @endsection
