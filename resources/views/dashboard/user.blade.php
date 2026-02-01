@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div>
    <h1>Mi Perfil</h1>
    
    <p><strong>Usuario:</strong> {{ $user->username }}</p>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Apellidos:</strong> {{ $user->lastname }}</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
</div>
@endsection
