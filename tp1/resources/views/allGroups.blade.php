@extends('basicLayout')

@section('title')
    Grupos públicos
@endsection

@section('headerMessage')
    <h4 style="color: whitesmoke">Selecciona un grupo para unirte a la conversación</h4>
@endsection

@section('content')
    <div class="col-sm-12 frame">
        <ul>
            @forelse ($rooms as $room)
                <li><a href="/room/join/{{ $room->name }}/{{ $user->name }}">{{ $room->name }}</a>
            @empty
                <li>No hay grupos públicos disponibles.</li>
            @endforelse
        </ul>
    </div>
@endsection