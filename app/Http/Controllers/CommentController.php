<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function store(Request $request, Article $article)
    {
        $request->validate([
            'text' => 'required|min:1'
        ]);

        $comment = new Comment;
        $comment->text = $request->text;
        $comment->article_id = $article->id;
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('article.show', ['article' => $article->id])
            ->with('success', 'Комментарий добавлен');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('article');

        $articleId = $comment->article_id;
        $comment->delete();

        return redirect()->route('article.show', ['article' => $articleId])
            ->with('success', 'Комментарий удалён');
    }
}
