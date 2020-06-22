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
          <input type="text" name="title" class="form-control" id="titleform">
        </div>
        <div class="form-group">
          <label for="textform">本文</label>
          <textarea name="text" class="form-control" id="textform" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
          <div class="custom-file">
            <input type="file" name="img_path" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">画像を選択</label>
          </div>
        </div>
        <input type="submit" class="btn btn-primary" value="投稿する">
      </form>
    </div>
  </div>
</div>
@endsection