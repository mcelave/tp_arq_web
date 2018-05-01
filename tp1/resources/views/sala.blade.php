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
    //Remember to replace key and cluster with your credentials.
     Pusher.logToConsole = true;
    var pusher = new Pusher('9565156bc0be46907d1c', {
      cluster: 'us2',
      encrypted: true
    });
 
    //Also remember to change channel and event name if your's are different.
    var channel = pusher.subscribe('notify');

     /* channel.bind('pusher:subscription_succeeded', function(members) {
    alert('successfully subscribed!');
    });*/

    channel.bind('notify-event', function(nombre) {
      // location.reload();
      /*$.ajax({url: "http://localhost:8000/cargarParticipantes", success: function(result){
           debugger;
           var lista =  $("#listausuarios");
           var copiares = result;
           $("#listausuarios").append(" <div ><p> shelton </p> </div> ");

           alert(result);
        


        }});  */  
      $("#listausuarios").append(" <div ><p>" + nombre + "</p> </div> ");
        alert(nombre);
    });

  
 
    </script> 

 <div class="row">

   <?php
         echo Form::open(array('url' => 'mensajes/enviar'));
            echo Form::text('mensaje','');
            
            echo Form::submit('enviar');
         echo Form::close();
      ?>

  </div>

  <div class="row">
    <div  class="column"  style="overflow-y:scroll;">
         

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
            <div class="usuario">
                
                 <p> <?php { echo $nombreUsuario;  } ?> </p>
              </div>       
           <?php   
            
            }   

            ?>
   </div>


</div>

    </body>
</html>
