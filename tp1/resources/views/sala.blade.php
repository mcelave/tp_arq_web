<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sala chat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style>
        <!-- Styles -->
          body {
              margin: 0 auto;
              max-width: 800px;
              padding: 0 20px;

          }

         .container {
            border: 20px solid #dadada;
            background-color: #ddd;
            border-radius: 10px;
            padding: 10px;
            margin: 10px 0;
            border-color: #ccc;
            background-color: #ddd;
         }


         .container::mensaje {
            content: "";
            clear: both;
            display: table;
        }

         .time-left {
            float: left;
            color: #999;
        }

        .time-right {
            float: right;
            color: #aaa;
        }

         .column{
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        .usuarios{
            float: right;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

      .row:after {
          content: "";
          display: table;
          clear: both;
      } 
      </style>
    </head>
  <body style="background-color:#FAFAD2;">
    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
      var users = @json($usuarios);
      var messages = [];
      var currentOpenChatUser;

      users.forEach(function(user) {
        messages[user.nombre] = [];
        bindOnClick(user.nombre);
      })

      Pusher.logToConsole = true;
      var pusher = new Pusher('9565156bc0be46907d1c', {
        cluster: 'us2',
        encrypted: true
      });
   
      var channel = pusher.subscribe('notify');

      channel.bind('notify-event', addUser);
      channel.bind('notify-mensaje-publico', function(contenido) {
        addPublicMessage(contenido);
        clearPublicMessageInput();
      });

      channel.bind('notify-mensaje-privado', function(nombreUsuario, contenido) {
        addPrivateMessage(nombreUsuario, contenido);
      });

      function addUser(nombre) {
        $("#listausuarios").append(" <div id="+ nombre + " ><p>" + nombre + "</p> </div> ");
        bindOnClick(nombre);
      }

      function bindOnClick(username) {
        $(document).on('click',"#" + username, function() {
          currentOpenChatUser = username;
          displayPrivateMessagesForUser(username);
          unHighlightUser(username);
        })
      }

      function displayPrivateMessagesForUser(nombre) {
        $("#privateChat").empty();
        let currentMessages = messages[nombre];

        for (message in currentMessages) {
          $("#privateChat").append(divMessage(message))
        }
      }

      function addPublicMessage(content) {
        var fecha = new Date();

        $("#listamensajes").append(divMessage(content));
      }

      function addPrivateMessage(fromUsername, content) {
        messages[fromUsername].push(content);
        highlightUser(fromUsername);
        
        if (currentOpenChatUser == fromUsername) {
          $("#privateChat").append(divMessage(content))
        }
      }

      function divMessage(content) {
        let fecha = new Date();
        return '<div class="container mensaje">' +
            "<p>" + content + "</p>" +
            '<span class="time-left">' + fecha + '</span>' +
          '</div>'
      }
  
      function highlightUser(username) {
        $("#" + username).css('background','#FFFF00')
      }

      function unHighlightUser(username) {
        $("#" + username).css('background','#FAFAD2')
      }

      function clearPublicMessageInput() {
        //no me salio, pero queda por si llegamos a hacerlo, no es necesario igual
        $("#publicTextInput").text("");
      }

    </script> 

    <div style ="float: left; width: 70%">
      <div id="publicTextInput" class="row">
        <?php
          echo Form::open(array('url' => 'mensajes/enviar'));
          echo Form::text('mensaje','');
          echo Form::submit('enviar');
          echo Form::close();
        ?>
      </div>

      <div class="row">
        <div id="listamensajes" class="column"  style="overflow-y:scroll;">
            <?php foreach ($mensajes as $mensaje) { 
              $contenido = $mensaje->contenido; 
              $nombre = $mensaje->id_usuario;
              $fecha = $mensaje->fecha;
              ?>
              <div class="container mensaje">
                  
                   <p> <?php { echo $contenido;  } ?> </p>
                   <span class="time-left"><?php { echo $fecha;  } ?></span>
                </div>       
             <?php   
              
              }   

              ?>
      </div> 

      <div id= "listausuarios" class="column"  style="overflow-y:scroll;">

      <h2> Presentes en la sala </h2>
          <?php foreach ($usuarios as $usuario) { 
              $nombreUsuario = $usuario->nombre; 
              ?>
              <div id=<?php { echo $nombreUsuario;  } ?> class="usuario">
                  <p> <?php { echo $nombreUsuario;  } ?> </p>
                </div>       
             <?php   
              
              }   
            ?>
         </div>
      </div>
    </div>
    <div id="privateChat" style="float:right; width:30%">
    </div>
  </body>
</html>
