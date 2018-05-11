
<!doctype html>

<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
      $(document).ready(function() {
        let users = <?php echo json_encode($users); ?>;
        users.forEach(function(user) { 
          add(user.name);
        })

        function add(username) { 
          let thisUser = <?php echo json_encode($thisUser); ?>;
          let hrefString = location.origin + '/startNewRoom/&members=' + username + ',' + thisUser;
          //con en el controller podemos getear los integrantes de la sala $category = Input::get('members', 'default category');
          $("#names-list").append('<div><a href=' + hrefString + ' id=' + username + '>' + username + '</a></div>');
        }
      });
    </script>
    <title>Lista de usuarios</title>
  </head>
<body>
  <h2>Wachin, selecciona a alguien para empezar una conversacion privada ;)</h2>
  <h3 id="names-list">
  </h3>
</body>

</html>