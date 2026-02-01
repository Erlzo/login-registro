@extends('layouts.app')

@section('title', 'Dashboard - Administrador')

@section('content')
<div class="container">
    <div class="dashboard-card" style="max-width: 1200px; width: 100%;">
        <h2>Panel de Administrador</h2>
        
        <p>Bienvenido, <strong>{{ Auth::user()->name }}</strong>. A continuación se muestra la lista de todos los usuarios registrados en el sistema.</p>

        <table class="table">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Rol</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td><strong>{{ $user->username }}</strong></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge badge-{{ $user->role === 'admin' ? 'admin' : 'user' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; color: #999;">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <p style="margin-top: 1.5rem; color: #666; font-size: 0.9rem;">
            Total de usuarios: <strong>{{ count($users) }}</strong>
        </p>
    </div>
</div>
@endsection
