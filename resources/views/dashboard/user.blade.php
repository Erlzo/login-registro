@extends('layouts.app')

@section('title', 'Mi Perfil')

@section('content')
<div class="container">
    <div class="dashboard-card" style="max-width: 600px; width: 100%;">
        <h2>Mi Información Personal</h2>
        
        <div class="user-info">
            <div class="user-info-row">
                <span class="user-info-label">Usuario:</span>
                <span class="user-info-value">{{ $user->username }}</span>
            </div>
            
            <div class="user-info-row">
                <span class="user-info-label">Nombre:</span>
                <span class="user-info-value">{{ $user->name }}</span>
            </div>
            
            <div class="user-info-row">
                <span class="user-info-label">Apellidos:</span>
                <span class="user-info-value">{{ $user->lastname }}</span>
            </div>
            
            <div class="user-info-row">
                <span class="user-info-label">Email:</span>
                <span class="user-info-value">{{ $user->email }}</span>
            </div>
        </div>

        <p style="color: #666; text-align: center; margin-top: 2rem;">
            Esta es tu información personal registrada en el sistema.
        </p>
    </div>
</div>
@endsection
