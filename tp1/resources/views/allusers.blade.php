
<!doctype html>

<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
 
    <script src="js/utils.js"></script>

    <script>
      let users = <?php echo json_encode($users); ?>;
    </script>
    <title>Lista de usuarios</title>
  </head>
<body>
<h2>Wachin, selecciona a alguien para empezar una conversacion privada ;)</h1>
  
</body>

</html>