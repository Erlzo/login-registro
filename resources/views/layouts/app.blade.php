<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema Login')</title>
</head>
<body>
    <nav>
        <div>
            <strong>Sistema Login</strong>
        </div>
        <div>
            @if(Auth::check())
                Hola, {{ Auth::user()->name }}
                <a href="{{ url('/dashboard') }}">Dashboard</a>
                <a href="{{ url('/logout') }}">Logout</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Registrarse</a>
            @endif
        </div>
    </nav>

    <div>
        @if ($message = Session::get('success'))
            <div>
                {{ $message }}
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div>
                {{ $message }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>
    </div>
</body>
</html>
