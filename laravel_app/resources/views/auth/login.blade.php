@extends('layout')

@section('content')
<h1>Iniciar sesión</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('success'))
    <p>{{ session('success') }}</p>
@endif
<form method="POST" action="{{ url('/login') }}">
    @csrf
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}">
    </div>
    <div>
        <label>Contraseña</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Entrar</button>
</form>
@endsection
