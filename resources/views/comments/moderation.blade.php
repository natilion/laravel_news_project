@extends('layout')

@section('title', 'Модерация комментариев')

@section('content')
    <section class="articles_section">
        <h1 class="articles_title">Модерация комментариев</h1>

        <section class="comments_section">
            <div class="comments_card">
                @if(session('success'))
                    <p class="comments_success">{{ session('success') }}</p>
                @endif

                <div class="comments_list">
                    @forelse ($comments as $comment)
                        <article class="comment_item">
                            <div class="comment_head">
                                <div>
                                    <p class="comment_author">{{ $comment->user->name }}</p>
                                    <p class="comment_date">{{ $comment->created_at->format('d.m.Y H:i') }}</p>
                                </div>
                            </div>

                            <p class="moderation_article">
                                Статья:
                                <a href="{{ route('article.show', ['article' => $comment->article->id]) }}">
                                    {{ $comment->article->title }}
                                </a>
                            </p>

                            <p class="comment_text">{{ $comment->text }}</p>

                            <div class="moderation_actions">
                                <form action="{{ route('comments.approve', ['comment' => $comment->id]) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="article_but">Одобрить</button>
                                </form>

                                <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="article_but">Отклонить</button>
                                </form>
                            </div>
                        </article>
                    @empty
                        <p class="comments_empty">Комментариев нет.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </section>
@endsection