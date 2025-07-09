@extends('layout')

@section('content')
<h1>Mis anuncios</h1>
<a href="{{ route('ads.create') }}">Crear anuncio</a>
<table border="1" cellpadding="5">
    <tr>
        <th>Título</th>
        <th>Acciones</th>
    </tr>
    @foreach ($ads as $ad)
        <tr>
            <td>{{ $ad->title }}</td>
            <td>
                <a href="{{ route('ads.edit', $ad) }}">Editar</a>
                <form action="{{ route('ads.destroy', $ad) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
@endsection
