<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;


class CommentController extends Controller
{
    public function store(Post $post, CreateCommentRequest $request)
    {
        $data = $request->validated(); // [ 'body' => $request->get('body')]
        $comment = $post->comments()->create($data);

        Mail::to($post->user)->send(
            new CommentReceived($comment, $post, auth()->user())
        );

        return back();
    }
}
