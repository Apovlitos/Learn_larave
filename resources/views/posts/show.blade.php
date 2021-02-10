@extends('layout')

@section('posts')
    <div class="container-fluid border border-info rounded">
        <h2 class="blog-post-title">{{ $article->title }}</h2>
        <p class="blog-post-meta">{{ $article->created_at }} by <a href="#">Author</a></p>
        <p>{{ $article->content }}</p>
    </div>
    <br>
    <a href="/posts/{{ $article->getKey() }}/edit" class="btn btn-primary">Изменить статью</a>
@endsection
