<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Post $post)
    {
        $this->validate(request(), [
            'body' => 'required|min:2'
        ]);

        $post->addComment(request('body'));

        return back();
    }

}
