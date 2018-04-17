@extends('layouts.master')

@section('content')
    <ol>
        @foreach($tasks as $task)
            <li>
                <a href="/tasks/{{$task->id}}">{{$task->title}}</a>
            </li>
        @endforeach
    </ol>
@endsection
