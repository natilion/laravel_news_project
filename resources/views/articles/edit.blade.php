@extends('layout')

@section('title', 'Редактирование статьи')

@section('content')
    <section class="edit_article_section">
        <div class="edit_article_card">
            <h1 class="edit_article_title">Редактирование статьи</h1>
            <p class="edit_article_subtitle">
                Измените данные статьи и сохраните обновления
            </p>

            <form class="edit_article_form" action="/article/{{$article->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="edit_form_group">
                    <label for="title">Заголовок</label>
                    <input type="text" id="title" name="title" value="{{$article->title}}" required>
                </div>

                <div class="edit_form_group">
                    <label for="datePublic">Дата публикации</label>
                    <input type="text" id="datePublic" name="datePublic" value="{{$article->datePublic}}" required>
                </div>

                <div class="edit_form_group">
                    <label for="shortDesc">Краткое описание</label>
                    <textarea id="shortDesc" name="shortDesc" rows="4" required>{{$article->shortDesc}}</textarea>
                </div>

                <div class="edit_form_group">
                    <label for="desc">Полное описание</label>
                    <textarea id="desc" name="desc" rows="8" required>{{$article->desc}}</textarea>
                </div>

                <div class="edit_article_actions">
                    <button type="submit" class="edit_article_button">Сохранить</button>
                </div>
            </form>
        </div>
    </section>
@endsection