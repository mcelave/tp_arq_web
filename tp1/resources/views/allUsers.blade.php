
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
          display(user);
        })

        function display(user) { 
          let thisUser = <?php echo json_encode($thisUser); ?>;
          let hrefString = location.origin + '/startPrivateConversation?members=' + thisUser.id + ',' + user.id;
          $("#names-list").append('<div><a href=' + hrefString + ' id=' + user.id + '>' + user.name + '</a></div>');
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