<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class PostSearch
{

  // 検索用メソッド
  public static function search($input, $tag)
  {
    if ($input != '' && $tag != '') { // inputとtagが両方あった場合
      $posts = Post::whereHas('tags', function($query) use ($tag) {
        $query->where('id', $tag);
      })->where('title', 'like', '%' .$input. '%')->paginate(10);
    } elseif ($input != '') { // inputだけあった場合
      $posts = Post::with('user')->where('title', 'like', '%' .$input. '%')->paginate(10);
    } elseif ($tag != '') { // tagだけあった場合
      $posts = Post::whereHas('tags', function($query) use ($tag) {
        $query->where('id', $tag);
      })->paginate(10);
    } else { // 検索条件が何もなかった場合
      $posts = Post::with('user')->orderBy('created_at', 'desc')->paginate(10);
    }

    return $posts;
  }
}