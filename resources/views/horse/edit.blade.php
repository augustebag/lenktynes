@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                <form method="POST" action="{{route('horse.update',$horse)}}" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="horse_name" value="{{old('horse_name', $horse->name)}}">
                        <small class="form-text text-muted">Name.</small>
                      </div>

                    <div class="form-group">
                        <label>Runs:</label>
                        <input type="text" class="form-control" name="horse_runs" value="{{old('horse_runs', $horse->runs)}}">
                        <small class="form-text text-muted">Runs.</small>
                     </div>

                    <div class="form-group">
                        <label>Wins:</label>
                        <input type="text" class="form-control" name="horse_wins" value="{{old('horse_wins', $horse->wins)}}">
                        <small class="form-text text-muted">Wins.</small>
                    </div>

                    <div class="form-group">
                        <div class="small-photo">
                            @if($horse->photo)
                            <img src="{{$horse->photo}}">
                            <label>Delete photo <input type="checkbox" name="delete_horse_photo"></label>
                            @else
                            <img src="{{asset('no-img.png')}}">
                            @endif
                        <label>Photo</label>
                        <input type="file" class="form-control" name="horse_photo">
                        <small class="form-text text-muted">Upload photo</small>
                      </div>
                    </div>

                    <div class="form-group">
                        <label>About:</label>
                        <textarea type="text" class="form-control" name="horse_about" value="{{old('horse_about', $horse->about)}}"" id="summernote"></textarea>
                        <small class="form-text text-muted">About.</small>
                     </div>

                    @csrf
                    <button type="submit" class="btn btn-outline-dark btn-sm">EDIT</button>
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