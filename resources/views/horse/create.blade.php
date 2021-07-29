@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">New Horse</div>

               <div class="card-body">

                <form method="POST" action="{{route('horse.store')}}" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="horse_name" value="{{old('horse_name')}}">
                        <small class="form-text text-muted">Name.</small>
                      </div>

                    <div class="form-group">
                        <label>Runs:</label>
                        <input type="text" class="form-control" name="horse_runs" value="{{old('horse_runs')}}">
                        <small class="form-text text-muted">Runs.</small>
                     </div>

                    <div class="form-group">
                        <label>Wins:</label>
                        <input type="text" class="form-control" name="horse_wins" value="{{old('horse_wins')}}">
                        <small class="form-text text-muted">Wins.</small>
                    </div>

                    <div class="form-group">
                        <label>About:</label>
                        <textarea type="text" class="form-control" name="horse_about" id="summernote" value="{{old('horse_about')}}"></textarea>
                        <small class="form-text text-muted">About.</small>
                     </div>

                     <div class="form-group">
                    <div class="small-photo">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="horse_photo">
                        <small class="form-text text-muted">Upload photo</small>
                      </div>
                    </div>


                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">ADD</button>

                </form>
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
@section('title') Horses @endsection