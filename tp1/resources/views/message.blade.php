
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
    <link href="css/room.css" rel="stylesheet" >
 
    <script src="js/utils.js"></script>

    <script>
    //funcion para enviar mensajes
    function enviar(user, msg) {
          $.ajax({
            url: "http://localhost:8000/sendMessage/"+user+"/"+msg,
            type: 'GET'
            });      
        }

    $( document ).ready(function() {

          function suscribeToChannel(rawChannelName ,pusher,userName){
            var channelName = rawChannelName.split(' ').join('_');
            console.log(channelName);

            //Also remember to change channel and event name if your's are different.
            var channel = pusher.subscribe(channelName);

            channel.bind('client-notify-message', function (data) {
                // Create element from template and set values
              
              if (userName == data.user){    
               control = '<li style="width:100%">' +
                        '<div class="msj-rta macro">' +
                            '<div class="text text-l">' +
                                '<p>'+ data.message +'</p>' +
                                '<p><small>'+data.user+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';  
                }else{
                    control = '<li style="width:100%">' +
                        '<div class="msj macro">' +
                            '<div class="text text-l">' +
                                '<p>'+ data.message +'</p>' +
                                '<p><small>'+data.user+'</small></p>' +
                            '</div>' +
                        '</div>' +
                    '</li>';  
                }
                $("ul").append(control).scrollTop($("ul").prop('scrollHeight')); 
            });
               return channel;
        }

         Pusher.logToConsole = true;
          var pusher = new Pusher('9565156bc0be46907d1c', {
            cluster: 'us2',
            encrypted: true
          });

          let channelName = <?php echo json_encode($roomName); ?>;
         let userName = <?php echo json_encode($userName); ?>;
        var channel = suscribeToChannel(channelName ,pusher, userName); 

          $(".mytext").on("keydown", function(e){
              if (e.which == 13){
                  var text = $(this).val();
                  if (text !== ""){
                      enviar(userName, text);              
                      $(this).val('');
                  }
              }
          });

      $('body > div > div > div:nth-child(2) > span').click(function(){
           $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13}); 
      });
    

    });
         

    </script>
    <title>{{$roomName}}</title>

  </head>
<body>
<h1>{{$roomName}}</h1>
<h4>Bienvenido {{$userName}}</h4>
<div class="col-sm-3 col-sm-offset-4 frame">
            <ul></ul>
            <div>
                <div class="msj-rta macro">                        
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="mytext" placeholder="Type a message"/>
                    </div> 

                </div>
                <div style="padding:10px;">
                    <span class="glyphicon glyphicon-share-alt"></span>
                </div>                
            </div>
  </div>       

</body>

</html>