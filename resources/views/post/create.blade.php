@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      新規投稿
    </div>
    <div class="card-body">
      <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
          <label for="titleform">タイトル</label>
          <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="titleform" value="{{ old('title') }}">
          @error('title')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
        <div class="form-group">
          <label for="textform">本文</label>
          <textarea name="text" class="form-control @error('title') is-invalid @enderror" id="textform" cols="30" rows="10">{{ old('text') }}</textarea>
          @error('text')
            <span class="invalid-feedback">
              <strong>{{ $message }}</strong>
            </span>
          @enderror

        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" name="img_file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">画像を選択</label>
          </div>
        </div>
        <div class="form-group">
          <div>タグ</div>
          @foreach ($tags as $tag)
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="custom-control-input" id="tag_{{ $tag->id }}">
              <label class="custom-control-label" for="tag_{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
          @endforeach
        </div>
        <input type="submit" class="btn btn-primary" value="投稿する">
      </form>
    </div>
  </div>
</div>
@endsection