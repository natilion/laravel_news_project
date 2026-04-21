<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <title>@yield('title', 'Новостной сайт')</title>
</head>
<body>
    <header>
        <div class="header_container">
            <a class="logo_a" href="{{ route('home') }}">
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="Логотип">
            </a>
            <nav>
                <a href="/articles/show">Статьи</a>
                <a href="{{ route('about') }}">О нас</a>
                <a href="{{ route('contacts') }}">Контакты</a>
                <a href="/signup">Регистрация</a>
                <a href="signin">Вход</a>
            </nav>
        </div>
    </header>

    <main>
        <div class="main_container">
            <div class="page_card">
                @yield('content')
            </div>
        </div>
    </main>

    <footer>
        <div class="footer_container">
            243-323 Малов Михаил Александрович
        </div>
    </footer>
</body>
</html>