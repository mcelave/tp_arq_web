
<!doctype html>

<html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>-->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> 
     <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
    <link href="css/room.css" rel="stylesheet" >
 
    <script src="js/utils.js"></script>

    <script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('9565156bc0be46907d1c', {
      cluster: 'us2',
      encrypted: true
    });

    let channelName = <?php echo json_encode($roomName); ?>;
    var channel = suscribeToChannel(channelName ,pusher);   

    </script>
    <title>{{$roomName}}</title>

  </head>
<body>
<h1>{{$roomName}}</h1>
<div class="chat_window">
   <div class="top_menu">
   <!--Notificaciones -->
      <div class="buttons">
         <div class="button close"></div>
       
      </div>
      <div class="title">Chat</div>
   </div>
   <ul id="messages" class="messages"></ul>
  
  
   <div class="bottom_wrapper clearfix">
      <div class="message_input_wrapper">
       
        <input class="message_input" placeholder="Type your message here..." />
          
        <button class="send_message">enviar</button>

     
   </div>
  </div>

</div>
<!--<div class="message_template">
   <li class="message">
      <div class="avatar"></div>
      <div class="text_wrapper">
         <div class="text"></div>
      </div>
   </li>
</div> -->

<script id="chat_message_template" type="text/template">
    <div class="message">
        <div class="avatar">
            <img src="">
        </div>
        <div class="text-display">
            <div class="message-data">
                <span class="author"></span>
                <span class="timestamp"></span>
                <span class="seen"></span>
            </div>
            <p class="message-body"></p>
        </div>
    </div>
</script>

<script>
     $(init);

</script>
</body>


</html>