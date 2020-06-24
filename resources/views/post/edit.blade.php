@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      投稿を編集
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('post.update', ['id' => $post->id]) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="titleform">タイトル</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="titleform" value="{{ $post->title }}">
          @error('title')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="textform">本文</label>
          <textarea name="text" class="form-control @error('title') is-invalid @enderror" id="textform" cols="30" rows="10">{{ $post->text }}</textarea>
          @error('text')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

        </div>
        <div class="form-group">
          @if ($post->img_path)
            <div>
              <span>現在の画像</span>
            </div>
            <img src="{{ $post->img_path }}" alt="現在の画像" class="img-fluid img-thumbnail">
            <div class="form-group form-check">
              <input type="checkbox" name="del_img" class="form-check-input" id="exampleCheck1" value="1">
              <label class="form-check-label" for="exampleCheck1">画像を削除する</label>
            </div>
          @endif
          <div class="custom-file">
            <input type="file" name="img_file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">画像を選択</label>
          </div>
        </div>
        <div class="form-group">
          <div>タグ</div>
          @foreach ($tags as $tag)
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="custom-control-input" id="tag_{{ $tag->id }}"
                @foreach ($post->tags as $postTag)
                  @if ($postTag->id == $tag->id) checked="checked" @endif
                @endforeach>
              <label class="custom-control-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
          @endforeach
        </div>
        <input type="submit" class="btn btn-primary" value="編集する">
      </form>
    </div>
  </div>
</div>
@endsection