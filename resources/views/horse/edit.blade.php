@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Edit</div>

               <div class="card-body">
                <form method="POST" action="{{route('horse.update',$horse)}}">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" class="form-control" name="horse_name" value="{{$horse->name}}">
                        <small class="form-text text-muted">Name.</small>
                      </div>

                    <div class="form-group">
                        <label>Runs:</label>
                        <input type="text" class="form-control" name="horse_runs" value="{{$horse->runs}}">
                        <small class="form-text text-muted">Runs.</small>
                     </div>

                    <div class="form-group">
                        <label>Wins:</label>
                        <input type="text" class="form-control" name="horse_wins" value="{{$horse->wins}}">
                        <small class="form-text text-muted">Wins.</small>
                    </div>

                    <div class="form-group">
                        <label>About:</label>
                        <textarea type="text" class="form-control" name="horse_about" value="{{$horse->about}}" id="summernote"></textarea>
                        <small class="form-text text-muted">About.</small>
                     </div>

                    @csrf
                    <button type="submit" class="btn btn-light">EDIT</button>
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
                