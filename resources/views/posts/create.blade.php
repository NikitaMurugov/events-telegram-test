@extends('layouts.app')

@section('content')
<div class="content">
    <form action="{{ route('posts.store') }}" method="post" class="card m-5 p-5">
        @csrf
        <div class="row">
            <label> Введите название поста
                <input type="text" name="name" id="" class="form-control">
            </label>
        </div>
        <div class="row">
            <label> Введите описание поста
                <textarea type="text" name="body" id="" class="form-control">

                </textarea>
            </label>
        </div>
        <div class="row">
            <div class="form-check">
                <input class="form-check-input" type="radio" value="1" name="active" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                    Активный
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" value="0" name="active" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Деактивный
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
