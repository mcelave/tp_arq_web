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
    let currentUser = <?php echo json_encode($user); ?>;
    let channelName = <?php echo json_encode($channelName); ?>;

    var pusher = newPusher();

    $( document ).ready(function() {
        ajaxSetup();

        suscribeToChannel(channelName, pusher, currentUser.name);

        $(".mytext").on("keydown", function(e){
            if (e.which == 13){
                var text = $(this).val();
                if (text !== "") {
                  sendMessage(currentUser.name, text, channelName);
                  $(this).val('');
                }
            }
        });

      $('body > div > div > div:nth-child(2) > span').click(function(){
           $(".mytext").trigger({type: 'keydown', which: 13, keyCode: 13}); 
      });

        setLinkToAllUsers(currentUser);
    });

    </script>
    <title>{{$room-> name}}</title>

</head>
<body>
    <h1>{{$room-> name}}</h1>
    <h4>Bienvenido {{$user -> name}}</h4>
    <h6 id="linkToAllUsers"></h6>

    <div class="col-sm-3 col-sm-offset-4 frame">
        <ul></ul>
        <div>
            <div class="msj-rta macro">
                <div class="text text-r" style="background:whitesmoke !important">
                    <input class="mytext" placeholder="Escriba un mensaje"/>
                </div>
            </div>
            <div style="padding:10px;">
                <span class="glyphicon glyphicon-share-alt"></span>
            </div>
            <div style="padding:10px;">
                <input id="image" name="image" type="file" class="inputfile" onchange="onChange(event, currentUser, channelName)"></input>
                <label for="image" class="glyphicon glyphicon-camera"></label>
            </div>
        </div>
    </div>
</body>
</html>