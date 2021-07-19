@extends('layouts.app')

@section('title', 'Create a post')

@section('content')
<form method="POST" action="/posts">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control" id="body" rows="5" placeholder="Write your post here..."></textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" name="is_published" class="form-check-input" id="is_published" value="1">
        <label class="form-check-label" for="is_published">Publish right away?</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection