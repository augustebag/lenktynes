<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
</head>
<body>
   <h1> Horse: {{$horse->name}} </h1>
   <div class="form-group">
 </div>
 <div class="form-group">
  <label>Runs: </label>
  <small class="form-text text-muted"> {{$horse->runs}}</small>
</div>
 <div class="form-group">
   <label>Wins: </label>
   <small class="form-text text-muted"> {{$horse->wins}}</small>
 </div>
 <div class="form-group">
   <label> About: </label>
   <small class="form-text text-muted"> {{$horse->about}}</small>
 </div>
</body>
</html>
