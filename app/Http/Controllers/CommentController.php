<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function read()
    {
        $comments = Comment::all();
        // dd($comments->role);

        return view('comments', ['comments' => $comments]);
    }

    public function create()
    {
        return view('comments_create');
    }
}
