@extends('layouts.app')

@section('content')
<div class="container">
  @include('post.postLists', ['posts' => $posts, 'tags' => $tags, 'input' => $input, 'tagId' => $tagId])
  {{ $posts->appends(request()->input())->links() }}
</div>
@endsection