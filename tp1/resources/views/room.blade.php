@extends('roomLayout')

@section('title')
    {{ $room-> name }}
@endsection

@section('headerMessage')
    <h4 style="color: whitesmoke">Bienvenido {{$user -> name}} a {{$room-> name}}</h4>
@endsection

@section('content')
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
@endsection