@extends('layout')

@section('title', 'Статьи')

@section('content')
    <section class="articles_section">
        <h1 class="articles_title">Статьи</h1>

        <div class="articles_grid">
            @foreach ($articles as $article)
                <article class="article_card">
                    <div class="article_content"><a href="/article/{{$article->id}}">
                        <p class="article_date">{{ $article->datePublic }}</p>
                        <h2 class="article_name">{{ $article->title }}</h2>
                        <p class="article_short">{{ $article->shortDesc }}</p>

                        <div class="article_desc">
                            <p>{{ $article->desc }}</p>
                        </div>
                    </a></div>
                </article>
            @endforeach
        </div>
    </section>
    <div class="pagination_block">
        {{ $articles->links() }}
    </div>
@endsection