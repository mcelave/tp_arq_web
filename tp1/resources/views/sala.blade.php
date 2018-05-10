<!doctype html>
<html lang="{{ app()->getLocale() }}">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>sala chat</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="css/messages.css" rel="stylesheet">
    </head>

<body style="background-color:#FAFAD2;">
    <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script>
    //Remember to replace key and cluster with your credentials.
     Pusher.logToConsole = true;
    var pusher = new Pusher('9565156bc0be46907d1c', {
      cluster: 'us2',
      encrypted: true
    });
 
    //Also remember to change channel and event name if your's are different.
    var channel = pusher.subscribe('notify');

    channel.bind('notify-mensaje', function(contenido) {
    
      var fecha = new Date();

      $("#listamensajes").append('<div class="container mensaje">' +
           "<p>" + contenido + "</p>" +
           '<span class="time-left">' + fecha + '</span>' +
           '</div>');
    });

    </script> 

 <div class="row">

  @yield('roomWelcome') 

   <?php
         echo Form::open(array('url' => 'mensajes/enviar'));
            echo Form::text('mensaje','');
            
            echo Form::submit('enviar');
         echo Form::close();
      ?>

  </div>

  <div class="row">
    <div id="listamensajes" class="column"  style="overflow-y:scroll;">
         
    <!--
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

            ?> -->
    </div> 


</div>

    </body>
</html>
