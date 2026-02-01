@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div>
    <h1>Login</h1>
    
    <form action="/login" method="POST">
        @csrf
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Contraseña:</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit">Entrar</button>
    </form>

    <p>
        ¿No tienes cuenta? <a href="/register">Registrate</a>
    </p>
</div>
@endsection
