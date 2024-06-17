<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function read()
    {
        $likes = Like::all();
        return view('admin.likes.index', ['likes' => $likes]);
    }

    public function create()
    {
        $users = User::all();
        $posts = Post::all();
        return view('admin.likes.create', ['users' => $users, 'posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'is_positive' => 'required',
            'username' => 'required',
            'title' => 'required',
        ]);

        Like::create([
            'is_positive' => $request->is_positive,
            'user_id' => $request->username,
            'post_id' => $request->title,
        ]);

        return redirect(route('like@read'));
    }

    public function edit($likeId)
    {
        $like = Like::find($likeId);
        $users = User::all();
        $posts = Post::all();
        return view('admin.likes.edit', ['like' => $like, 'users' => $users, 'posts' => $posts]);
    }

    public function update(Request $request, $likeId)
    {
        if (empty(request()->all())) {
            abort(404, 'Missing requeired fields');
        }

        $validatedData = $request->validate([
            'is_positive' => 'nullable',
            'user_id' => 'nullable',
            'post_id' => 'nullable',
        ]);

        $like = Like::find($likeId);
        $like->update($validatedData);

        return redirect(route('like@read'));
    }

    public function destroy($likeId)
    {
        $like = Like::find($likeId);
        $like->delete();

        return redirect('/likes');
    }
}
