@extends('layouts.app')

@section('content')
<div class="card m-5 ">
    <div class="card-header">
        <h4>{{ $post->name }}</h4>
    </div>
    <div class="card-body">
        <p>{{ $post->body }}</p>
        <h2>
            <span class="badge bg-info ">is active: {{ $post->active }}</span>
        </h2>
        <div>
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">изменить статус</a>
            <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger"> удолить</a>
        </div>
    </div>
</div>
@endsection
