@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>{{$post->title }}</h1>
<p>{{$post->body}}</p>
<hr />

<h3>Comments:</h3>
@foreach($post->comments as $comment)
<div>{{$comment->body}}</div>
@endforeach

@endsection