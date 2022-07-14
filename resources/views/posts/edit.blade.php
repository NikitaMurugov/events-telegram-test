@extends('layouts.app')

@section('content')
<div class="content">
    <form action="{{ route('posts.update', $post->id) }}" method="post" class="card m-5 p-5">
        @csrf
        @method('put')
        <h2>Изменить состояните поста {{ ' name:' . $post->name . ' id:' . $post->id }}</h2>
        <div class="row">
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="active" id="flexCheckDefault" @if($post->active) checked @endif>
                <label class="form-check-label" for="flexCheckDefault">
                    Активный
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="active" id="flexCheckChecked" @if(!$post->active) checked @endif>
                <label class="form-check-label" for="flexCheckChecked">
                    Деактивный
                </label>
            </div>
        </div>
        <div class="btn-group">
            <button type="submit" class="btn btn-success">Изменить</button>

        </div>
    </form>
    <form action="{{ route('posts.destroy', $post->id) }}" method="post" style="display: inline-block" class="card m-5 p-5">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection
