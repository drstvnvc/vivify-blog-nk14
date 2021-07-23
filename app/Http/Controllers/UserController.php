<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user)
    {
        // $user->load(['posts' => function ($postsQueryBuilder) {
        //     return $postsQueryBuilder->where('is_published', true);
        // }]);
        return view('users.show', compact('user'));
    }
}
