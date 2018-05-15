@extends('basicLayout')

@section('title')
    Crear Grupo
@endsection

@section('headerMessage')
    <h4 style="color: whitesmoke">Selecciona los usuarios que deseas unir al grupo</h4>
@endsection

@section('content')
    <form class="form-signin" action="{{ url('/room/public') }}" method="post" >
        <div class="col-sm-9 frame">
            <ul>
                @forelse ($users as $user)
                    <li><div class="checkbox"><label><input type="checkbox" name='members[]' value="{{ $user->name }}">{{ $user->name }}</label></div>
                @empty
                    <li>No hay usuarios en línea.</li>
                @endforelse
            </ul>
        </div>
        <div class="col-sm-3 frame sidebar">
            </br>
            <label for="inputName" class="sr-only">Nombre</label>
            <input type="text" id="nameText" name="name" class="form-control" placeholder="Nombre" required autofocus>
            </br>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="user" value="{{ $user->name }}">
            <input type="hidden" name="members[]" value="{{ $user->name }}">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Crear</button>
        </div>
    </form>
@endsection