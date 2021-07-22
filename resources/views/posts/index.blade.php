@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<h1>Posts</h1>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="{{ route('posts.show', [ 'post' => $post ]) }}">
            {{$post->title}} ({{$post->comments->count()}})
        </a>
    </li>
    @endforeach
</ul>
@endsection