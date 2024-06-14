<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function read()
    {
        $posts = Post::all();
        // dd($posts->role);

        return view('posts', ['posts' => $posts]);
    }
}
