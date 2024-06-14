<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function read()
    {
        $comments = Comment::all();
        // dd($comments->role);

        return view('comments.index', ['comments' => $comments]);
    }

    public function create()
    {
        $users = User::all();
        $posts = Post::all();
        return view('comments.create', ['users' => $users, 'posts' => $posts]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'content' => 'required',
            'username' => 'required',
            'title' => 'required',
        ]);

        Comment::create([
            'content' => $request->content,
            'user_id' => $request->username,
            'post_id' => $request->title,
        ]);

        return redirect('/comments');
    }

    public function edit($commentId)
    {
        $comment = Comment::find($commentId);
        $users = User::all();
        $posts = Post::all();
        return view('comments.edit', ['comment' => $comment, 'users' => $users, 'posts' => $posts]);
    }

    public function update(Request $request, $commentId)
    {

        if (empty(request()->all())) {
            abort(404, 'Missing requeired fields');
        }

        $validatedData = $request->validate([
            'content' => 'nullable',
            'user_id' => 'nullable',
            'post_id' => 'nullable',
        ]);

        $dataToUpdate = array_filter($validatedData, function ($value) {
            return ($value !== null);
        });

        $comment = Comment::find($commentId);
        $comment->update($dataToUpdate);

        return redirect('/comments');
    }


    public function destroy($commentId)
    {
        $comment = Comment::find($commentId);

        // Then delete the user
        $comment->delete();

        return redirect()->back();

    }
}
