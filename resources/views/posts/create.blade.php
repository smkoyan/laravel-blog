@extends('layouts.master')

@section('content')
    <h2>Publish post</h2>

    <hr>

    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea class="form-control" name="body" id="body"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('layouts.form_error')
    </form>
@endsection