@extends('layout')

@section('title', 'Создание статьи')

@section('content')
    <section class="edit_article_section">
        <div class="edit_article_card">
            <h1 class="edit_article_title">Создание статьи</h1>
            <p class="edit_article_subtitle">
                Введите информацию в статье
            </p>

            <form class="edit_article_form" action="/article" method="POST">
                @csrf
                <div class="edit_form_group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title" required>
                </div>

                <div class="edit_form_group">
                    <label for="datePublic">Дата публикации</label>
                    <input type="date" id="datePublic" name="datePublic" required>
                </div>

                <div class="edit_form_group">
                    <label for="shortDesc">Краткое описание</label>
                    <textarea id="shortDesc" name="shortDesc" rows="4" required></textarea>
                </div>

                <div class="edit_form_group">
                    <label for="desc">Полное описание</label>
                    <textarea id="desc" name="desc" rows="8" required></textarea>
                </div>

                <div class="edit_article_actions">
                    <button type="submit" class="edit_article_button">Создать</button>
                </div>
            </form>
        </div>
    </section>
@endsection