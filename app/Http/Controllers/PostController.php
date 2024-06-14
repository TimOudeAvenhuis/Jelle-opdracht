<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function read()
    {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        $users = User::all();
        $roles = Role::all();
        return view('posts.create', ['roles' => $roles, 'users' => $users]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'username' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->username,
        ]);

        return redirect('/posts');
    }

    public function edit($postId)
    {
        $post = Post::find($postId);

        $users = User::all();
        // dd($users);
        return view('posts.edit', ['post' => $post, 'users' => $users]);
    }

    public function update(Request $request, $postId)
    {


        // Check if request is emtpy, then cancel
        if (empty(request()->all())) {
            abort(400, 'Missing required fields.');
        }
        // Allow empty in validation rules
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'username' => 'nullable'
        ]);
        // Dont save stuff as empty, do not update those fields
        $dataToUpdate = array_filter($validatedData, function ($value) {
            return ($value !== null);
        });


        $post = Post::find($postId);
        $post->update($dataToUpdate);

        return redirect('/posts');
    }

    public function destroy($postId)
    {

        $post = Post::find($postId);
        // Then delete the user
        $post->delete();

        return redirect()->back();
    }
}
