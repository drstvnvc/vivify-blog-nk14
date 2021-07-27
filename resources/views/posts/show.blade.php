@extends('layouts.app')

@section('title', $post->title)

@section('content')
<h1>{{$post->title }}</h1>
<h4><a href="/users/{{$post->user->id}}">{{$post->user->name }}</a></h4>

<div>
@foreach($post->tags as $tag)
<span style="background-color: #{{$tag->color}}; border-radius: 10px; padding: 0px 10px"> 
    {{$tag->name}}
</span> 
@endforeach
</div>

<hr />
<p>{{$post->body}}</p>
<hr />

<h3>Comments:</h3>
@foreach($post->comments as $comment)
<div>
    <h4><a href="/users/{{$comment->user->id}}">{{$comment->user->id}} {{$comment->user->name}}</a></h4>
    <blockquote>
        {{$comment->body}}
    </blockquote>
</div>
@endforeach

@auth
<form method="POST" action="{{route('post.comment', ['post'=>$post])}}">
    @csrf
    <div class="form-group">
        <label for="body">Comment</label>
        <textarea name="body" class="form-control" id="body" rows="3" placeholder="Write your comment here..."></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endauth
@endsection