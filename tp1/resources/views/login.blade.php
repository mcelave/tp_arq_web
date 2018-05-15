<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Laravel chat tp1</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="{{ url('/users/store') }}" method="post" >
      <h1 class="h3 mb-3 font-weight-normal">Registrate</h1>

      <div class="bg-warning">
        <div class="text-danger">
          @if ($errors->any())
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          @endif
        </div>
      </div>

      <label for="inputName" class="sr-only">Nombre</label>
      <input type="text" id="nameText" name="name" class="form-control" placeholder="Nombre" required autofocus>

      <label for="inputAge" class="sr-only">Edad</label>
      <input type="number" id="ageText"  name="age" class="form-control" placeholder="Edad" required>
     
      <label for="inputCity" class="sr-only">Ciudad</label>
      <input type="text" id="cityText" name="city" class="form-control" placeholder="Ciudad" required>
     
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
    </form>
  </body>
</html>
