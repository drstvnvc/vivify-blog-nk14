@extends('layouts.app')

@section('title', $user->name)

@section('content')
<h1>{{$user->name}}</h1>
<ul>
    @foreach($user->publishedPosts as $post)
    <li>
        <a href="{{ route('posts.show', [ 'post' => $post ]) }}">
            {{$post->title}}
        </a>
    </li>
    @endforeach
</ul>
@endsection