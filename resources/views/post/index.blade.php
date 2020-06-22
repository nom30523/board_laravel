@extends('layouts.app')

@section('content')
<div class="container">
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">ニックネーム</th>
        <th scope="col">タイトル</th>
        <th scope="col">投稿日時</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($posts as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->user->name }}</td>
          <td><a href="{{ route('post.show', ['id' => $post->id]) }}">{{ $post->title }}</a></td>
          <td>{{ $post->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection