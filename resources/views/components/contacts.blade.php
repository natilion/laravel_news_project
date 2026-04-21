@extends('layout')

@section('title', 'Контакты')

@section('content')
    <h1>Контакты</h1>

    <ul class="contacts-list">
        <li><strong>Адрес:</strong> {{ $contacts['address'] }}</li>
        <li><strong>Телефон:</strong> {{ $contacts['phone'] }}</li>
        <li><strong>Email:</strong> {{ $contacts['email'] }}</li>
        <li><strong>Режим работы:</strong> {{ $contacts['work_time'] }}</li>
    </ul>
@endsection