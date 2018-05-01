<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repositories\PostRepository;


class PostsController extends Controller
{
    public function __construct() {
        $this->middleware('auth')
            ->only('create', 'store');
    }

    public function index(PostRepository $repository) {
        $posts = $repository->all();

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

        session()->flash('message', 'Your post successfully published');

        return redirect('/');
    }
}
