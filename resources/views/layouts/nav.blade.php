<div class="blog-masthead">
    <div class="container">
        <nav class="nav blog-nav">
            <a class="nav-link active" href="/">Home</a>
            <a class="nav-link" href="/posts/create">Create new post</a>

            @if( auth()->check() )
                <a class="nav-link ml-auto" href="#">{{ auth()->user()->name }}</a>
                <a class="nav-link" href="/logout">Logout</a>
            @else
                <a class="nav-link ml-auto" href="/register">Register</a>
                <a class="nav-link" href="/login">Login</a>
            @endif
        </nav>
    </div>
</div>