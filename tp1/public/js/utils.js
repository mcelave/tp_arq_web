   

function suscribeToChannel(rawChannelName){


    var channelName = rawChannelName.split(' ').join('_');
    console.log(channelName);
    Pusher.logToConsole = true;
    var pusher = new Pusher('9565156bc0be46907d1c', {
      cluster: 'us2',
      encrypted: true
    });
 
    //Also remember to change channel and event name if your's are different.
    var channel = pusher.subscribe(channelName);

    channel.bind('notify-message', function(content) {
      alert('llego el mensaje');
     
    /*$("#listamensajes").append('<div class="container mensaje">' +
           "</*p>" + content + "</p>" +
           '</div>');*/
    });

    return channel;
}

