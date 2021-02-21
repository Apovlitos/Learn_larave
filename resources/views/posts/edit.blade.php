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
    <form method="post" action="{{ route('posts.update', $article->getKey()) }}">
        @csrf
        @method('PATCH')
        @include('form.form')
    </form>
    <form method="post" action="{{ route('posts.destroy', $article->getKey()) }}">
        @csrf
        @method('DELETE')
        <button class="w-20 btn btn-lg btn-danger mt-3" type="submit">Удалить статью</button>
    </form>
@endsection
