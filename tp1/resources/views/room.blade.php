<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/pusher.min.js"></script>
        <script src="js/utils.js"></script>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="css/room.css" rel="stylesheet">

        <script>
            var currentUser = <?php echo json_encode($user); ?>;
            var channelName = <?php echo json_encode($channelName); ?>;
            var pusher = newPusher(<?php echo json_encode(env('PUSHER_APP_KEY')); ?>);
            var messageEvent = <?php echo json_encode(env('PUSHER_MESSAGE_EVENT')); ?>;
            var imageEvent = <?php echo json_encode(env('PUSHER_IMAGE_EVENT')); ?>;

            $( document ).ready(function() {
                ajaxSetup();
                suscribeToChannel(channelName, pusher, currentUser.name, messageEvent, imageEvent);
                sendingMessageTriggers();
                setLinkToAllUsers(currentUser);
            });
        </script>
        <title>{{ $room-> name }}</title>
    </head>
    <body>
        <h4>Bienvenido {{$user -> name}} a {{$room-> name}}</h4>
        <h6 id="linkToAllUsers"></h6>

        <div class="col-sm-12 frame">
            <ul></ul>
            <div>
                <div class="msj-response macro">
                    <div class="text text-r" style="background:whitesmoke !important">
                        <input class="message" placeholder="Escriba un mensaje"/>
                    </div>
                </div>
                <div style="padding:10px;">
                    <span id="sendMsg" class="glyphicon glyphicon-share-alt"></span>
                </div>
                <div style="padding:10px;">
                    <input id="image" name="image" type="file" class="inputfile" onchange="onChangeImageButton(event, currentUser, channelName)">
                    <label for="image" class="glyphicon glyphicon-camera"></label>
                </div>
            </div>
        </div>
    </body>
</html>