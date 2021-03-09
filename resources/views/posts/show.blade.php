@extends('layout')

@section('title', 'Читать статью')

@section('posts')
    <div class="container-fluid border border-info rounded">
        <h2 class="blog-post-title">{{ $article->title }}</h2>
        <p class="blog-post-meta">{{ $article->created_at }} by <a href="#">Author</a></p>
        <p>{{ $article->content }}</p>
    </div>
    <br>
    <a href="{{ route('posts.edit', $article->getRouteKey()) }}" class="btn btn-primary">Изменить статью</a>
@endsection
