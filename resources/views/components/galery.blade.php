@extends('layout')

@section('title', 'Галерея')

@section('content')
<img class="galery_img" src="{{ asset('images/' . $image) }}" alt=" "></a>
@endsection