@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{$better->betterHorse->name}}</div>
        <div class="card-body">
          <div class="form-group">
            <label>Better Name</label>
            <small class="form-text text-muted">{{$better->name}}</small>
          </div>
          <div class="form-group">
            <label>Better Surname</label>
            <small class="form-text text-muted">{{$better->surname}}</small>
          </div>
          <div class="form-group">
            <label> Bet</label>
            <small class="form-text text-muted"> {{$better->bet}}</small>
          </div>
          <a href="{{route('better.edit',[$better])}}" class="btn btn-outline-dark btn-sm">Edit</a>
          <a href="{{route('better.pdf',[$better])}}" class="btn btn-outline-dark btn-sm">PDF</a>
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