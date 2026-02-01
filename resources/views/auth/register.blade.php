@extends('layouts.app')

@section('title', 'Registro')

@section('content')
<div>
    <h1>Registrarse</h1>
    
    <form action="/register" method="POST">
        @csrf
        
        <div>
            <label>Usuario:</label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>Nombre:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Apellidos:</label>
            <input type="text" name="lastname" required>
        </div>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Registrarse</button>
    </form>

    <p>
        ¿Ya tienes cuenta? <a href="/login">Inicia sesión</a>
    </p>
</div>
@endsection
