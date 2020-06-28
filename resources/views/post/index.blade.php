@extends('layouts.app')

@section('content')
<div class="container">
  @include('post.postLists', ['posts' => $posts, 'tags' => $tags, 'input' => $input, 'tagId' => ''])
  {{ $posts->links() }}
</div>
@endsection