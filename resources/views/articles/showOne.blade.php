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

                @can('article')
                    <a class="article_but" href="/article/{{$article->id}}/edit">Редактировать</a>
                    <form action="/article/{{$article->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="article_but">Удалить</button>
                    </form>
                @endcan
            </div>
        </article>

        <section class="comments_section">
            <div class="comments_card">
                <h2 class="comments_title">Комментарии</h2>

                @if(session('success'))
                    <p class="comments_success">{{ session('success') }}</p>
                @endif

                @error('text')
                    <p class="comments_error">{{ $message }}</p>
                @enderror

                <form class="comments_form" action="{{ route('comments.store', ['article' => $article->id]) }}" method="POST">
                    @csrf
                    <div class="comments_form_group">
                        <label for="text">Добавить комментарий</label>
                        <textarea id="text" name="text" rows="4" placeholder="Введите текст комментария" required>{{ old('text') }}</textarea>
                    </div>

                    <button type="submit" class="article_but">Отправить</button>
                </form>

                <div class="comments_list">
                    @forelse ($article->comments as $comment)
                        <article class="comment_item">
                            <div class="comment_head">
                                <div>
                                    <p class="comment_author">{{ $comment->user->name }}</p>
                                    <p class="comment_date">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                                </div>

                                @can('article')
                                    <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="article_but">Удалить</button>
                                    </form>
                                @endcan
                            </div>

                            <p class="comment_text">{{ $comment->text }}</p>
                        </article>
                    @empty
                        <p class="comments_empty">Пока комментариев нет. Будьте первым.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </section>
@endsection