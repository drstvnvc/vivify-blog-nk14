@extends('layouts.app')

@section('title', 'Create a post')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST" action="/posts">
    @csrf
    <div class="form-group has-validation">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
        @include('partials.error-message', ['field' => 'title'])
    </div>
    <div class="form-group has-validation">
        <label for="body">Body</label>
        <textarea name="body" class="form-control" id="body" rows="5" placeholder="Write your post here..."></textarea>
        @include('partials.error-message', ['field' => 'body'])

    </div>
    <div class="form-check">
        <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1">
        <label class="form-check-label" for="is_published">Publish right away?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection