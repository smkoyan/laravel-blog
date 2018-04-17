<?php

namespace App\Http\Controllers;

use App\Post;


class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->only('create', 'store');
    }

    public function index() {
        $posts = Post::latest()
            ->filter(request(['year', 'month']))
            ->get();


        return view('posts.index')
            ->with('posts', $posts);
    }

    public function show(Post $post) {
        return view('posts.show')
            ->with('post', $post);
    }

    public function create() {
        return view('posts.create');
    }

    public function store() {
        $validatedData = $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publishPost(
            new Post($validatedData)
        );

        return redirect('/');
    }
}
