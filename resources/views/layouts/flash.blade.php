@if ($message = session('message'))
    <div class="flash-message alert alert-success">
        {{ $message }}
    </div>
@endif