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

         .container::after {
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

        
      </style>
    </head>
<body>
    
  
   <?php
         echo Form::open(array('url' => 'mensajes/enviar'));
            echo Form::text('mensaje','');
            
            echo Form::submit('enviar');
         echo Form::close();
      ?>


 
      <?php foreach ($mensajes as $mensaje) { 

        
            $contenido = $mensaje->contenido; 
            $nombre = $mensaje->id_usuario;
            $fecha = $mensaje->fecha;
            ?>
            <div class="container">
                
                 <p> <?php { echo $contenido;  } ?> </p>
                 <span class="time-left"><?php { echo $fecha;  } ?></span>
              </div>       
           <?php   
            
            }   

            ?>
           

    

           

          
 
     
    







    </body>
</html>
