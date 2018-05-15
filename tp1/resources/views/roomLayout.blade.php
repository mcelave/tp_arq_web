@extends('basicLayout')

@section('scripts')
    var currentUser = <?php echo json_encode($user); ?>;
    var channelName = <?php echo json_encode($channelName); ?>;
    var pusher = newPusher(<?php echo json_encode(env('PUSHER_APP_KEY')); ?>);
    var messageEvent = <?php echo json_encode(env('PUSHER_MESSAGE_EVENT')); ?>;
    var imageEvent = <?php echo json_encode(env('PUSHER_IMAGE_EVENT')); ?>;

    $( document ).ready(function() {
    ajaxSetup();
    suscribeToChannel(channelName, pusher, currentUser.name, messageEvent, imageEvent);
    sendingMessageTriggers();
    });
@endsection