@extends('basicLayout')

@section('title')
    Usuarios
@endsection

@section('headerMessage')
    <div class="col-sm-9">
        <h4 style="color: whitesmoke">Inicia una conversación privada</h4>
    </div>
    <div class="col-sm-3">
        <a class="navbar-brand" href="/room/createGroup/{{ $currentUser->name }}">Crear nuevo grupo</a>
    </div>
@endsection

@section('content')
    <div class="col-sm-12 frame">
        <ul>
            @forelse ($users as $user)
                <li><a href="/users/{{ $user->name }}?currentUser={{ $currentUser->name }}">{{ $user->name }}</a> -
                    <a href="/room/{{ $currentUser->name }}/{{ $user->name }}">Privado</a></li>
            @empty
                <li>No hay usuarios en línea.</li>
            @endforelse
        </ul>
    </div>
@endsection