<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Http\Requests\StorePost;
use App\Services\PostImageSave;

class PostsController extends Controller
{
    public function index()
    {
        return view('post.index');
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request)
    {
        $post = new Post;

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        $post->user_id = Auth::id();
        if (!empty($request->img_file)) {
            $post->img_path  = PostImageSave::fileSave($request);
        }
        $post->save();

        return redirect('post/index');
    }
}
