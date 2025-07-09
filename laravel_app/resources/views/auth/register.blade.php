@extends('layout')

@section('content')
<h1>Registrarse</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ url('/register') }}">
    @csrf
    <div>
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}">
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label>Teléfono</label>
        <input type="text" name="phone" value="{{ old('phone') }}">
    </div>
    <div>
        <label>Alias</label>
        <input type="text" name="alias" value="{{ old('alias') }}">
    </div>
    <div>
        <label>Fecha de nacimiento</label>
        <input type="date" name="birthdate" value="{{ old('birthdate') }}">
    </div>
    <div>
        <label>Género</label>
        <input type="text" name="gender" value="{{ old('gender') }}">
    </div>
    <div>
        <label>Contraseña</label>
        <input type="password" name="password">
    </div>
    <div>
        <label>Confirmar contraseña</label>
        <input type="password" name="password_confirmation">
    </div>
    <button type="submit">Crear cuenta</button>
</form>
@endsection
