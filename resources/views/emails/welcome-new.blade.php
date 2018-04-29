@component('mail::message')
# Successful Registration

Welcome {{ $user->name }}!!!

@component('mail::button', ['url' => 'http://localhost:8000/posts/create'])
Publish Your First Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
