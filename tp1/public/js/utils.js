   
function suscribeToChannel(rawChannelName ,pusher){


    var channelName = rawChannelName.split(' ').join('_');
    console.log(channelName);

    //Also remember to change channel and event name if your's are different.
    var channel = pusher.subscribe(channelName);

    channel.bind('client-notify-message', function (data) {
        // Create element from template and set values

       alert(data.message);
       alert(data.user);
   
     }
    );

   
   
    return channel;
}


  

    


