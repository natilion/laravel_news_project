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
        $comment->is_approved = false;
        $comment->save();

        return redirect()->route('article.show', ['article' => $article->id])->with('success', 'Комментарий ждет одобрения модерации');
    }

    public function moderation()
    {
        Gate::authorize('article');

        $comments = Comment::where('is_approved', false)
            ->with(['article', 'user'])
            ->latest()
            ->get();

        return view('comments/moderation', ['comments' => $comments]);
    }

    public function approve(Comment $comment)
    {
        Gate::authorize('article');

        $comment->is_approved = true;
        $comment->save();

        return redirect()->route('comments.moderation')->with('success', 'Комментарий одобрен');
    }

    public function destroy(Comment $comment)
    {
        Gate::authorize('article');

        $articleId = $comment->article_id;
        $comment->delete();

        return redirect()->route('comments.moderation')->with('success', 'Комментарий удалён');
    }
}