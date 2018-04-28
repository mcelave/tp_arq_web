<!doctype html>
<html>
<head>
<title>ingrese nombre para entrar sala</title>
</head>
<body>

    
   <?php
         echo Form::open(array('url' => '/usuario/store'));
            echo Form::text('nombre','');
            
            echo Form::submit('registrar nombre');
         echo Form::close();
      ?>


</body>
</html>