function newPusher() {
    return new Pusher('9565156bc0be46907d1c', {
        cluster: 'us2',
        encrypted: true});
}

function ajaxSetup() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

function sendMessage(user, msg, channelName) {
    $.ajax({
        url: location.origin + "/sendMessage/" + user + "/" + msg + "/" + channelName,
        type: 'GET'
    });
}

function sendImage(user, msg, extension, channelName) {
    $.ajax({
        url: location.origin + "/sendImage",
        type: 'POST',
        data: {user: user, image: msg, extension: extension, channelName: channelName},
    });
}

function suscribeToChannel(channelName, pusher, userName){

    var channel = pusher.subscribe(channelName);
    var control;

    channel.bind('client-notify-message', function (data) {

    if (userName == data.user){
        control = '<li style="width:100%">' +
            '<div class="msj-rta macro">' +
                '<div class="text text-l">' +
                    '<p>'+ data.message +'</p>' +
                    '<p><small>'+data.user+'</small></p>' +
                '</div>' +
            '</div>' +
        '</li>';  
    } else {
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

  //para imagen
   channel.bind('client-notify-image', function (data) {
       alert(data.image);
       var user = data.user;
      var image = "img\\" + data.image;

        control = '<li style="width:100%">' +
        '<div class="msj macro">' +
        "<img src='" +image  + "' style='width:128px;height:128px;'>" +
            '<p><small>'+user+'</small></p>' +
        '</div>' +
        '</li>';  

      $("ul").append(control).scrollTop($("ul").prop('scrollHeight'));

   });
}

function onChange(event, user) {
    var file = event.target.files[0];
    var extension = file.name.split('.')[1];
    var reader = new FileReader();
    reader.onload = function(event) {
        var imagen = event.target.result;
        imagen.replace(/^data:image\/(png|jpg);base64,/, "");
        sendImage(user.name,imagen, extension, 'client-notify-image');
    };
    reader.readAsDataURL(file);
}

function setLinkToAllUsers(user) {
    $(linkToAllUsers).append("<a href=" + location.origin + "/allUsers/" + user.id +">Lista de usuarios</a>")
}