@extends('layout')

@section('content')
<h1>Editar anuncio</h1>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('ads.update', $ad) }}">
    @csrf
    @method('PUT')
    <div>
        <label>Título</label>
        <input type="text" name="title" value="{{ old('title', $ad->title) }}">
    </div>
    <div>
        <label>Descripción</label>
        <textarea name="description">{{ old('description', $ad->description) }}</textarea>
    </div>
    <div>
        <label>Categorías</label>
        <input type="text" name="categories" value="{{ old('categories', $ad->categories) }}">
    </div>
    <div>
        <label>Tarifa</label>
        <input type="text" name="rate" value="{{ old('rate', $ad->rate) }}">
    </div>
    <div>
        <label>Zona</label>
        <input type="text" name="zone" value="{{ old('zone', $ad->zone) }}">
    </div>
    <div>
        <label>Idiomas</label>
        <input type="text" name="languages" value="{{ old('languages', $ad->languages) }}">
    </div>
    <div>
        <label>Activo</label>
        <input type="checkbox" name="active" value="1" {{ $ad->active ? 'checked' : '' }}>
    </div>
    <button type="submit">Actualizar</button>
</form>
@endsection
