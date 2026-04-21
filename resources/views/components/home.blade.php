@extends('layout')

@section('title', 'Главная')

@section('content')
    <section class="articles_section">
        <h1 class="articles_title">Новости</h1>

        <div class="articles_grid">
            @foreach ($articles as $article)
                <article class="article_card">
                    <div class="article_image_wrap">
                        <a href="/galery/{{$article->full_image}}">
                            <img
                                class="article_image"
                                src="{{ asset('images/' . $article->preview_image) }}"
                                alt="{{ $article->name }}">
                        </a>
                    </div>

                    <div class="article_content">
                        <p class="article_date">{{ $article->date }}</p>
                        <h2 class="article_name">{{ $article->name }}</h2>
                        <p class="article_short">{{ $article->shortDesc ?? '' }}</p> <!-- безопасный вывод -->

                        <div class="article_desc">
                            <p>{{ $article->desc }}</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
@endsection