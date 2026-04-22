@extends('layout')

@section('title', 'Вход')

@section('content')
    <section class="signup_section">
        <div class="signup_card">
            <h1 class="signup_title">Вход</h1>

            <form class="signup_form" action="/auth/signIn" method="POST">
                @csrf
                <div class="form_group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" placeholder="Введите email" required>
                </div>

                <div class="form_group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>

                <button type="submit" class="signup_button">Войти</button>
            </form>
        </div>
    </section>
@endsection