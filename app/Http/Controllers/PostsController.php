<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Http\Requests\StorePost;

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
            $requestFile = $request->file('img_file')->getClientOriginalName();
            $fileName = date('YmdHis') . Auth::id() . substr($requestFile, strpos($requestFile, '.'));
            $request->img_file->storeAs('public/images', $fileName);
            $post->img_path  = 'public/images/' . $fileName;
        }
        $post->save();

        return redirect('post/index');
    }
}
