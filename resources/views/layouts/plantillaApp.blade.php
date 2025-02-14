<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/plantillaApp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="navContenedor">
        <div class="nav1">
            <h2>Nombre Proyecto</h2>
            <button id="cerrarSesion">Cerrar Sesión</button>
        </div>
        <div class="nav2">
            <button>Listado de estaciones</button>
            <button>Lista de usuarios</button>
            <button>Lista de acceso usuarios</button>
            <button>Ficha mantenimiento de estaciones</button>
            <button>Ficha mantenimiento de usuarios</button>
            <button>Ficha con mapa y selector de medidas</button>
        </div>
    </div>

    @yield('content') <!-- Aquí se insertará el contenido de cada vista -->
   
    @if(Auth::check())
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    @endif

    <div class="footer">
        <p id="copi">&copy; 2025 Aplicación Meteorológica</p>
    </div>
</body>
</html>