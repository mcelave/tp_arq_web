
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="lechuzas">
  

    <title>Laravel chat tp1</title>

    <!-- Bootstrap core CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" action="{{ url('/users/store') }}" method="post" >
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Registrate wacho</h1>
     
      <label for="inputName" class="sr-only">Nombre</label>
      <input type="text" id="nameText" name="name" class="form-control" placeholder="Nombre" required autofocus>

      <label for="inputAge" class="sr-only">Edad</label>
      <input type="text" id="ageText"  name="age" class="form-control" placeholder="Edad" required>
     
      <label for="inputCity" class="sr-only">Ciudad</label>
      <input type="text" id="cityText" name="city" class="form-control" placeholder="Ciudad" required>
     
      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>
    </form>
  </body>
</html>
