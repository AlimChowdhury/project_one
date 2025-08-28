<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // List all posts
    public function index()
    {
        $temp = Post::latest()->get();
        return view('Posts.index', compact('temp'));
    }

    // Show form to create a post
    public function create()
    {
        return view('Posts.create');
    }

    // Store new post
    public function store(Request $request)
    {     
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }




    // Show a single post
    public function show($id)
    {
        Gate::authorize('view-post');

        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Show form to edit a post
    public function edit($id)
    {
        Gate::authorize('edit-post');

        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // Update the post
    public function update(Request $request, $id)
    {
        Gate::authorize('edit-post');

        $post = Post::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post->update($request->only('title', 'content'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully!');
    }

    // Delete the post
    public function destroy($id)
    {
        Gate::authorize('delete-post');

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully');
    }

}
