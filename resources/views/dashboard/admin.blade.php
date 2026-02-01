@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<div>
    <h1>Panel de Administrador</h1>
    
    <p>Hola {{ Auth::user()->name }}, aquí están todos los usuarios:</p>

    <table>
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
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->lastname }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>
        Total de usuarios: {{ count($users) }}
    </p>
</div>
@endsection
