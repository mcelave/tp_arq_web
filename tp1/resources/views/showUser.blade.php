@extends('basicLayout')

@section('title')
    Información de {{ $user->name }}
@endsection

@section('headerMessage')
    <h4 style="color: whitesmoke">Información de {{ $user->name }}</h4>
@endsection

@section('content')
    <ul class="userData">
        <li>Apodo: {{ $user->name }}</li>
        <li>Edad: {{ $user->age }}</li>
        <li>Ciudad: {{ $user->city }}</li>
    </ul>
@endsection