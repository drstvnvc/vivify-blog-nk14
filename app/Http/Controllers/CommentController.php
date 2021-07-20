<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Models\Post;


class CommentController extends Controller
{
    public function store(Post $post, CreateCommentRequest $request)
    {
        $data = $request->validated(); // [ 'body' => $request->get('body')]
        $post->comments()->create($data);
        return back();
    }
}
