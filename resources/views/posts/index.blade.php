@extends('layouts.app')

@section('content')
<div class="content">
    @forelse ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $post->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">is active?: {{ $post->active }}</h6>
                <p class="card-text">{{ $post->body }}</p>
                <a href="{{ route('posts.show', $post->id) }}" class="card-link">open card</a>
                <a href="{{ route('posts.edit', $post->id) }}" class="card-link">change card</a>
            </div>
        </div>
    @empty
    <h2> Постов походу нет...:( </h2>
    @endforelse
</div>
@endsection
