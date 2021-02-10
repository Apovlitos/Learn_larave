@extends('layout')

@section('posts')
    <form method="post" action="/posts/{{ $article->getKey() }}">
        @csrf
        @method('PATCH')
        <label for="inputEmail">Название:</label>
        <input type="text" id="inputEmail" class="form-control" name="title" value="{{ $article->title }}" minlength="5" maxlength="100">
        <label for="inputPassword">Тематика:</label>
        <select class="form-control" id="formSelect" name="type">
            @foreach(\App\Models\Types::all() as $type)
                <option>{{ $type->type }}</option>
            @endforeach
        </select>
        <label for="inputPassword">Описание:</label>
        <textarea id="inputPassword" class="form-control" name="description" rows="3" maxlength="255"></textarea>
        <label for="inputPassword">Содержание:</label>
        <textarea id="inputPassword" class="form-control" name="content" rows="10"></textarea>
        <div class="form-check">
            @if($article->published == true)
                <input class="form-check-input" type="checkbox" id="check" name="published" checked>
            @else
                <input class="form-check-input" type="checkbox" id="check" name="published">
            @endif
                <label class="form-check-label" for="check">
                Опубликовать
            </label>
        </div>
        <button type="submit" class="w-20 btn btn-lg btn-primary mt-3">Применить изменения</button>
    </form>
    <form method="post" action="{{ route('posts.destroy', $article->getKey()) }}">
        @csrf
        @method('DELETE')
        <button class="w-20 btn btn-lg btn-danger mt-3" type="submit">Удалить статью</button>
    </form>
@endsection
