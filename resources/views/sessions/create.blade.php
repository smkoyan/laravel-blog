@extends('layouts.master')

@section('content')
    <h2>Login</h2>

    <hr>

    <form action="/login" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Login</button>
        </div>

        @include('layouts.form_error')
    </form>
@endsection