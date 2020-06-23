<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreComment;

class CommentsController extends Controller
{
    public function store(StoreComment $request, Post $post)
    {
        $comment = new Comment;
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $post->comments()->save($comment);

        return redirect(route('post.show', ['id' => $post->id]));
    }
}
