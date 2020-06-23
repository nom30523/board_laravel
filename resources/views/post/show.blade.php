@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between;">
      <div>{{ $post->title }}</div>
      @if (Auth::check() && Auth::id() === $post->user_id)
        <div>
          <a href="{{ route('post.edit', ['id' => $post->id]) }}" class="badge badge-primary" style="font-size: 16px;">編集</a>
          <a href="#" class="badge badge-danger" id="del" data-id="{{ $post->id }}" style="font-size: 16px;">削除</a>
          <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="post" id="del_{{ $post->id }}">
            @csrf
          </form>
        </div>
      @endif
    </div>
    <div class="card-body">
      <p class="card-text">{!! nl2br(e($post->text)) !!}</p>
      @if ($post->img_path)
        <img src="{{ $post->img_path }}" alt="投稿画像" class="img-fluid img-thumbnail">
      @endif
      <div style="text-align: right;">
        <span>{{ $post->user->name }}</span>
        <span>{{ $post->created_at }}</span>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      コメント
    </div>
    <div class="card-body">
      <ul class="list-group list-group-flush">
        @foreach ($comments as $comment)
          <li class="list-group-item">
            <p class="card-text">{!! nl2br(e($comment->body)) !!}</p>
            <div style="text-align: right;">
              <span>{{ $comment->user->name }} {{ $comment->created_at }}</span>
              @if (Auth::check() && Auth::id() === $comment->user_id)
                <a href="#" class="badge badge-danger del_com">削除</a>
              @endif
            </div>
          </li>
        @endforeach
      </ul>
      @if (Auth::check())
        <form action="{{ route('comment.store', ['post' => $post]) }}" method="post">
          @csrf
          <div class="form-group">
            <label for="commentform">コメント</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="commentform" cols="30" rows="10">{{ old('body') }}</textarea>
            @error('body')
              <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
          <input type="submit" class="btn btn-primary" value="コメントする">
        </form>
      @else
        <div class="card-text"><strong>※ログインするとコメントすることが出来ます。</strong></div>
      @endif
    </div>
  </div>
</div>
@if (Auth::check() && Auth::id() === $post->user_id)
  <script src="/js/delPost.js"></script>
@endif
@endsection