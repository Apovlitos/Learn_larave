@extends('layout')

@section('posts')
    @if($errors->count())
        <div class="alert alert-danger mt4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('posts.store') }}">
        @csrf
        <label for="inputEmail">Название:</label>
        <input type="text" id="inputEmail" class="form-control" value="{{ old('title') }}" name="title" minlength="5">
        <label for="type">Тематика:</label>
        <input type="text" id="type" class="form-control" value='{{ old('type') }}' name="type">
        <label for="description">Описание:</label>
        <textarea id="description" class="form-control" name="description" rows="3" maxlength="255">{{ old('description') }}</textarea>
        <label for="content">Содержание:</label>
        <textarea id="content" class="form-control" name="content" rows="10">{{ old('content') }}</textarea>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="check" name="published">
            <label class="form-check-label" for="check">
                Опубликовать
            </label>
        </div>
        <button class="w-25 btn btn-lg btn-primary mt-3" type="submit">Сделать статью</button>
    </form>
@endsection
