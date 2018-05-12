
<!doctype html>

<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
     <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <link href="css/room.css" rel="stylesheet" >
 
    <script src="js/utils.js"></script>

    <script>

   
        function sendImage(user, msg,extension) {
          $.ajax({
            url: location.origin + "/sendImage",
            type: 'POST',
            data: {user: user, image: msg, extension: extension},
            
          });      
        }

       function onChange(event,userName) {

          var file = event.target.files[0];
          var extension = file.name.split('.')[1];
          var reader = new FileReader();
            reader.onload = function(event) {
            // The file's text will be printed here

            var imagen = event.target.result;
            imagen.replace(/^data:image\/(png|jpg);base64,/, "");
            sendImage(userName,imagen, extension);

            };
          reader.readAsDataURL(file);
           
        } 


    $( document ).ready(function() {


       $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
        });

        function sendImage(user, msg,extension) {
          $.ajax({
            url: location.origin + "/sendImage",
            type: 'POST',
            data: {user: user, image: msg, extension: extension},
            

          });      
        }


     
      function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.width;
        canvas.height = img.height;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
      }
      

      Pusher.logToConsole = true;
        var pusher = new Pusher('9565156bc0be46907d1c', {
          cluster: 'us2',
          encrypted: true
        });

        let channelName = <?php echo json_encode($roomName); ?>;
        let user = <?php echo json_encode($user); ?>;
        var channel = suscribeToChannel(channelName, pusher, user.name);

          
      
          $(".mytext").on("keydown", function(e){
              if (e.which == 13){
                  var text = $(this).val();
                  if (text !== ""){
                      enviar(user.name, text);
                      $(this).val('');
                  }
              }
          });

      $('body > div > div > div:nth-child(2) > span').click(function(){
           $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13}); 
      });


      function readURL(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
             return e.target.result;
          }
         reader.readAsDataURL(input.files[0]);
        }
      }



      setLinkToAllUsers();

      function setLinkToAllUsers() {
        let user = <?php echo json_encode($user); ?>;
        $(linkToAllUsers).append("<a href=" + location.origin + "/allUsers/" + user.id +">Lista de usuarios</a>")
      }
    });
         

    </script>
    <title>{{$roomName}}</title>

  </head>
<body>
<h1>{{$roomName}}</h1>
<h4>Bienvenido {{$user -> name}}</h4>
<h6 id="linkToAllUsers"></h6>
<div class="col-sm-3 col-sm-offset-4 frame">
  <ul>
    <!--<li>
      <img id=imageid src="C:\Users\kotomi\Pictures\Mr._Small"  style='width:128px;height:128px;' >     
    <li> -->

  </ul>
  <div>
      <div class="msj-rta macro">                        
          <div class="text text-r" style="background:whitesmoke !important">
              <input class="mytext" placeholder="Type a message"/>
          </div> 



      </div>
      <div style="padding:10px;">
          <span class="glyphicon glyphicon-share-alt"></span>
      </div>
      <input id="image" type="file" class="btn btn-default btn-sm btn-round" onchange="onChange(event)">
        <span class="glyphicon glyphicon-paperclip"></span>
      </input>    

       
  </div>



</div>     

</body>

</html>