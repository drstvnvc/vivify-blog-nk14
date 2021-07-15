<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::all(); // DB::select('select * from posts');

    return view('posts', compact('posts'));
});

Route::get('/posts/{id}', function ($id) {
    $post = Post::findOrFail($id); // DB::select('select * from posts where id=$id limit 1');
    // if (!$post) {
    //     throw new ModelNotFoundException();
    // }
    return view('post', compact('post'));
});
