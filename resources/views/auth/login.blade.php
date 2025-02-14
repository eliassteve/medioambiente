@extends('layouts.plantillaApp')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="login">
        <h2 id="tituloLogin">Iniciar Sesión</h2>
        <form  method="POST" action="{{ route('login.post') }}">
            @csrf
            <p>Correo Electrónico</p>
            <input type="email" id="email" name="email" placeholder="Correo Electrónico">
            <p>Contraseña</p>
            <input type="password" id="passwd" name="passwd" placeholder="Contraseña">
            <button type="submit" id="entrar">Entrar</button>
            @if($errors->any())
                <p style="color: red;">{{ $errors->first() }}</p>
            @endif
        </form>
    </div>
@endsection