<form action="{{ route('post.search') }}" method="get">
  @csrf
  <div class="form-group">
    <span>記事検索</span>
    <div class="input-wrap row" >
      <input type="text" name="input" value="{{ $input }}" class="form-control col-9">
      <select name="tag" class="custom-select col-2">
        <option value="">タグを選択</option>
        @foreach ($tags as $tag)
          <option value="{{ $tag->id }}" @if ($tagId == $tag->id) selected @endif>{{ $tag->name }}</option>
        @endforeach
      </select>
      <input type="submit" value="検索" class="btn btn-primary col-1">
    </div>
  </div>
</form>
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
