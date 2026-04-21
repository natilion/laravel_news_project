@extends('layout')

@section('title', 'Регистрация')

@section('content')
    <section class="signup_section">
        <div class="signup_card">
            <h1 class="signup_title">Регистрация</h1>
            <p class="signup_subtitle">Введите данные пользователя для регистрации</p>

            <form class="signup_form" action="auth/login" method="POST">
                @csrf
                <div class="form_group">
                    <label for="name">Имя</label>
                    <input type="text" id="name" name="name" placeholder="Введите имя" required>
                </div>

                <div class="form_group">
                    <label for="email">Электронная почта</label>
                    <input type="email" id="email" name="email" placeholder="Введите email" required>
                </div>

                <div class="form_group">
                    <label for="password">Пароль</label>
                    <input type="password" id="password" name="password" placeholder="Введите пароль" required>
                </div>

                <button type="submit" class="signup_button">Зарегистрироваться</button>
            </form>
        </div>
    </section>
@endsection