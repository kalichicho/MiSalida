@extends('layout')

@section('content')
<h1>{{ $ad->title }}</h1>
<p>{{ $ad->description }}</p>
<p>Zona: {{ $ad->zone }}</p>
<p>Idiomas: {{ $ad->languages }}</p>
<p>Tarifa: {{ $ad->rate }}</p>
@endsection
