@extends('layouts.app')

@section('title', 'Sistema de Autenticación')

@section('content')
<div class="container" style="max-width: 800px; text-align: center;">
    <div style="background: white; border-radius: 10px; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2); padding: 3rem;">
        <h1 style="color: #333; font-size: 2.5rem; margin-bottom: 1.5rem;">Bienvenido</h1>
        <p style="color: #666; font-size: 1.1rem; margin-bottom: 2rem;">
            Este es un sistema de autenticación y registro de usuarios con roles (administrador y usuario).
        </p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; max-width: 400px; margin: 0 auto;">
            @if(Auth::check())
                <a href="{{ route('dashboard') }}" style="display: inline-block; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 5px; font-weight: 600; transition: transform 0.2s;">
                    Ir al Dashboard
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" style="width: 100%; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 5px; font-weight: 600; cursor: pointer; transition: transform 0.2s;">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" style="display: inline-block; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 5px; font-weight: 600; transition: transform 0.2s;">
                    Iniciar Sesión
                </a>
                <a href="{{ route('register') }}" style="display: inline-block; padding: 1rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; text-decoration: none; border-radius: 5px; font-weight: 600; transition: transform 0.2s;">
                    Registrarse
                </a>
            @endif
        </div>

        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid #eee;">
            <h3 style="color: #333; margin-bottom: 1.5rem;">Características:</h3>
            <ul style="list-style: none; color: #666; text-align: left; max-width: 500px; margin: 0 auto;">
                <li style="margin-bottom: 1rem;">✓ Registro de usuarios con campos: usuario, nombre, apellidos y email</li>
                <li style="margin-bottom: 1rem;">✓ Contraseñas encriptadas con Hash (seguridad)</li>
                <li style="margin-bottom: 1rem;">✓ Sistema de roles (Administrador y Usuario)</li>
                <li style="margin-bottom: 1rem;">✓ Panel de administrador con lista completa de usuarios</li>
                <li style="margin-bottom: 1rem;">✓ Panel de usuario con información personal</li>
                <li>✓ Autenticación segura con sesiones</li>
            </ul>
        </div>
    </div>
</div>
@endsection
