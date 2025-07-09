@extends('layout')

@section('content')
<h1>Nuevo anuncio</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('ads.store') }}">
    @csrf
    <div>
        <label>Título</label>
        <input type="text" name="title" value="{{ old('title') }}">
    </div>
    <div>
        <label>Descripción</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>
    <div>
        <label>Categorías</label>
        <input type="text" name="categories" value="{{ old('categories') }}">
    </div>
    <div>
        <label>Tarifa</label>
        <input type="text" name="rate" value="{{ old('rate') }}">
    </div>
    <div>
        <label>Zona</label>
        <input type="text" name="zone" value="{{ old('zone') }}">
    </div>
    <div>
        <label>Idiomas</label>
        <input type="text" name="languages" value="{{ old('languages') }}">
    </div>
    <button type="submit">Guardar</button>
</form>
@endsection
