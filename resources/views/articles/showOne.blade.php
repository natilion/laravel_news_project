@extends('layout')

@section('title', 'Статья')

@section('content')
    <section class="articles_section">
        <h1 class="articles_title">Просмотр статьи</h1>
        <article class="article_card">
            <div class="article_content">
                <p class="article_date">{{ $article->datePublic }}</p>
                <h2 class="article_name">{{ $article->title }}</h2>
                <p class="article_short">{{ $article->shortDesc }}</p>

                <div class="article_desc">
                    <p>{{ $article->desc }}</p>
                </div>
            </div>
            <div class="article_buts">
                <a class="article_but" href="/article/{{$article->id}}/edit">Редактировать</a>
                <form action="/article/{{$article->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="article_but">Удалить</button>
                </form>
            </div>
        </article>
    </section>
@endsection