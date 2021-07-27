@extends('layouts.app')

@section('title', 'Posts')

@section('content')
<h1>Posts</h1>

<ul>
    @foreach($posts as $post)
    <li>
        <a href="{{ route('posts.show', [ 'post' => $post ]) }}">
            {{$post->id}} {{$post->title}} ({{$post->comments->count()}})
        </a>
        -
        <a href="{{ route('users.show', [ 'user' => $post->user ]) }}">
            {{$post->user->name}}
        </a>
        @foreach($post->tags as $tag)
            <span style="background-color: #{{$tag->color}}; border-radius: 10px; padding: 0px 10px"> 
                {{$tag->name}}
            </span> 
        @endforeach
    </li>
    @endforeach
</ul>

<div>
{{ $posts->links() }}
</div>
@endsection