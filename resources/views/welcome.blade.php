@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div>
    <h1>Bienvenido</h1>
    
    <p>Sistema de login y registro de usuarios</p>

    @if(Auth::check())
        <p>Hola {{ Auth::user()->name }}!</p>
        <a href="/dashboard">Ir al Dashboard</a>
        <a href="/logout">Salir</a>
    @else
        <div>
            <a href="/login">Login</a>
            <a href="/register">Registrarse</a>
        </div>
    @endif
</div>
@endsection
