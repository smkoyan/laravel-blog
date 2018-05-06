@extends('layouts.master')

@section('content')
    <h2>{{ $post->title }}</h2>

    @if ( count($post->tags) )
        <ul>
            @foreach ($post->tags->pluck('name') as $tag)
                <li>
                    <a href="/posts/tags/{{ $tag }}">
                        {{ $tag }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    {{ $post->body }}

    @if (count($post->comments))
        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <em>{{ $comment->user['name'] }}</em> &nbsp;&nbsp;
                        <strong>
                            {{ $comment->created_at->diffForHumans() }}:&nbsp;
                        </strong>
                        {{ $comment->body }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (auth()->check())
        <hr>

        <div class="card">
            <div class="card-block">
                <form method="POST" action="/posts/{{ $post->id }}/comments">
                    @csrf

                    <div class="form-group">
                        <label for="body">Comment</label>
                        <textarea class="form-control" name="body" id="body" placeholder="Type you comment"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                    @include('layouts.form_error')
                </form>
            </div>
        </div>
    @endif
@endsection