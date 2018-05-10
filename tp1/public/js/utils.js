   
function suscribeToChannel(rawChannelName ,pusher){


    var channelName = rawChannelName.split(' ').join('_');
    console.log(channelName);

    //Also remember to change channel and event name if your's are different.
    var channel = pusher.subscribe(channelName);

    channel.bind('client-notify-message', function (data) {
        // Create element from template and set values
        var el = createMessageEl();
        el.find('.message-body').html(data.message);
        //el.find('.author').text(data.username);
      
        
        // Utility to build nicely formatted time
        el.find('.timestamp').text(strftime('%H:%M:%S %P', new Date(data.timestamp)));
        
        var messages = $('#messages');
        messages.append(el)
        
        // Make sure the incoming message is shown
        messages.scrollTop(messages[0].scrollHeight);
    }
    );

   
   
    return channel;
}


  function enviar(data) {
      $.ajax({
        url: "http://localhost:8000/sendMessage",
        type: 'POST',
        data: {"id": 3},
         error: function (xhr, b, c) {
            console.log("xhr=" + xhr + " b=" + b + " c=" + c);
        }  
            
        }); 
         
        
    }

     function init() {
        // send button click handling
        $('.send_message').click(sendMessage);
        $('.message_input').keypress(checkSend);
    }


     function checkSend(e) {
        if (e.keyCode === 13) {
            return sendMessage();
        }
    }

    function sendMessage() {
        var messageText = $('.message_input').val();
        if(messageText.length < 1) {
            return false;
        }

        var data = {message: messageText};
        enviar(data);

        return false;
    }

   

     function createMessageEl() {
        var text = $('#chat_message_template').text();
        var el = $(text);
        return el;
    }




