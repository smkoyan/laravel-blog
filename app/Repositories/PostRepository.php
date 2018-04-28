<?php

namespace App\Repositories;

use App\Post;
use Illuminate\Database\Eloquent\Collection;

class PostRepository {
    /**
     * @return Collection
     */
    public function all()
    {
        return Post::latest()
            ->filter(request(['year', 'month']))
            ->get();
    }
}