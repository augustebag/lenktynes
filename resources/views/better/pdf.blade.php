<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PDF</title>
</head>

<body>
  <h1> Horse: {{$better->betterHorse->name}} </h1>
  <div class="form-group">
    <small class="form-text text-muted"> Name: {{$better->name}}</small>
  </div>
  <div class="form-group">
    <label>Surname: </label>
    <small class="form-text text-muted"> {{$better->surname}}</small>
  </div>
  <div class="form-group">
    <label> Bet: </label>
    <small class="form-text text-muted"> {{$better->bet}}</small>
  </div>
</body>

</html>