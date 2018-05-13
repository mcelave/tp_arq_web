function enviar(user, msg, channelName) {
    $.ajax({
      url: location.origin + "/sendMessage/" + user + "/" + msg + "/" + channelName,
      type: 'GET'
    });      
  }

  function sendImage(user, msg,extension) {
    $.ajax({
      url: location.origin + "/sendImage",
      type: 'POST',
      data: {user: user, image: msg, extension: extension},
    });      
  }

 $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
  });

function suscribeToChannel(channelName, pusher, userName){
  console.log(channelName);

  //Also remember to change channel and event name if your's are different.
  var channel = pusher.subscribe(channelName);

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
  //para imagen
   channel.bind('client-notify-image', function (data) {
      var user = data.user;
      var image = data.image;
        alert(image);

        control = '<li style="width:100%">' +
        '<div class="msj macro">' +
        " <img src='" +image  + "' style='width:128px;height:128px;'>"+
       // " <canvas id='imgCanvas' />"+
        '</div>' +
        '</li>';  

      $("ul").append(control).scrollTop($("ul").prop('scrollHeight')) 

   });

  return channel;
}
