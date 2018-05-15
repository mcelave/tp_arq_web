function newPusher(envAppKey) {
    return new Pusher(envAppKey, {
        cluster: 'us2',
        encrypted: true});
}


function ajaxSetup() {
    $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});}


function suscribeToChannel(channelName, pusher, userName, messageEvent, imageEvent){
    var channel = pusher.subscribe(channelName);
    var control;

    channel.bind(messageEvent, function (data) {
    if (userName == data.user){
        control = '<li style="width:100%">' +
            '<div class="msj-response bubble">' +
                '<div class="text text-l">' +
                    '<p class="messageBody">'+ data.message +'</p>' +
                    '<p class="messageUser"><small>'+data.user+'</small></p>' +
                '</div>' +
            '</div>' +
        '</li>';  
    } else {
        control = '<li style="width:100%">' +
            '<div class="msj bubble">' +
                '<div class="text text-l">' +
                    '<p class="messageBody">'+ data.message +'</p>' +
                    '<p class="messageUser"><small>'+data.user+'</small></p>' +
                '</div>' +
            '</div>' +
        '</li>';  
    }
    $("ul").append(control).scrollTop($("ul").prop('scrollHeight')); 
  });

   channel.bind(imageEvent, function (data) {
       var image = "img/" + data.image;
       if (userName == data.user) {
           control = '<li style="width:100%">' +
               '<div class="msj-response bubble">' +
               "<div class=\"text text-l\"><a href='" +image  + "' target=\"_blank\"><img src='" +image  + "' style='width:128px;height:128px;'></a></br>" +
               '<p class="messageUser"><small>'+data.user+'</small></p></div>' +
               '</div>' +
               '</li>';
       } else {
           control = '<li style="width:100%">' +
               '<div class="msj bubble">' +
               "<div class=\"text text-l\"><a href='" + image + "' target=\"_blank\"><img src='" + image + "' style='width:128px;height:128px;'></a></br>" +
               '<p class="messageUser"><small>' +data.user+ '</small></p></div>' +
               '</div>' +
               '</li>';
       }
       $("ul").append(control).scrollTop($("ul").prop('scrollHeight'));
   });
}


function sendingMessageTriggers() {
    $(".message").on("keydown", function(event){
        if (event.which == 13){
            var text = $(this).val();
            if (text !== "") {
                sendMessageRequest(currentUser.name, text, channelName);
                $(this).val('');}}});

    $('#sendMsg').click(function(){
        $(".message").trigger({type: 'keydown', which: 13, keyCode: 13});});
}


function onChangeImageButton(event, user, channelName) {
    var file = event.target.files[0];
    var extension = file.name.split('.')[1];
    var reader = new FileReader();
    reader.onload = function(event) {
        var image = event.target.result;
        image.replace(/^data:image\/(png|jpg);base64,/, "");
        sendImageRequest(user.name, image, extension, channelName);
    };
    reader.readAsDataURL(file);
}


function sendMessageRequest(user, message, channelName) {
    $.ajax({
        url: location.origin + "/room/sendMessage",
        type: 'POST',
        data: {user: user, message: message, channelName: channelName},});}


function sendImageRequest(user, image, extension, channelName) {
    $.ajax({
        url: location.origin + "/room/sendImage",
        type: 'POST',
        data: {user: user, image: image, extension: extension, channelName: channelName},});}


function setLinkToAllUsers(user) {
    $(linkToAllUsers).append("<a href=" + location.origin + "/allUsers/" + user.id +">Lista de usuarios</a>")
}