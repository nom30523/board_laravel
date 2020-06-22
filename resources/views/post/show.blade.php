@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between;">
      <div>{{ $post->title }}</div>
      <div>
        <a href="#" class="badge badge-primary" style="font-size: 16px;">編集</a>
        <a href="#" data-id="{{ $post->id }}" class="badge badge-danger" style="font-size: 16px;">削除</a>
      </div>
    </div>
    <div class="card-body">
      <p class="card-text">{{ $post->text }}</p>
      @if ($post->img_path)
        <img src="{{ $post->img_path }}" alt="投稿画像">
      @endif
      <div style="text-align: right;">
        <span>{{ $post->user->name }}</span>
        <span>{{ $post->created_at }}</span>
      </div>
    </div>
  </div>
</div>
@endsection