@extends('layouts.master')

@section('content')
    <h1>{{$task->title}}</h1>
    <p>Created at {{$task->created_at}}</p>
    <p>
        <label>
            Completed <input type="checkbox" disabled @if($task->completed) checked @endif>
        </label>
    </p>
@endsection
