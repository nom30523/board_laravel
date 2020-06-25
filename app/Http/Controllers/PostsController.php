<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\StorePost;
use App\Services\PostImageSave;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
        $tags = Tag::all();
        return view('post.index', ['posts' => $posts, 'tags' => $tags, 'input' => '']);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('post.create', ['tags' => $tags]);
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

        $tagsId = $request->tags;
        $post->tags()->attach($tagsId);

        return redirect('post/index');
    }

    public function show($id)
    {
        $post = Post::find($id);
        $comments = $post->comments;

        return view('post.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'tags' => $tags]);
    }

    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);

        $post->title = $request->input('title');
        $post->text = $request->input('text');
        if ($request->input('del_img')) {
            $post->img_path = null;
        }
        if (!empty($request->img_file)) {
            $post->img_path  = PostImageSave::fileSave($request);
        }
        $post->save();

        $tagsId = $request->tags;
        if (!empty($post->tags->all())) {
            $post->tags()->sync($tagsId);
        } else {
            $post->tags()->attach($tagsId);
        }

        return redirect(route('post.show', ['id' => $post->id]));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('delete', $post);

        $post->delete();

        return redirect('post/index');
    }
}
