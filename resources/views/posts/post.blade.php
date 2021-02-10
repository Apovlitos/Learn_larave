@extends('layout')

@section('posts')
    <div class="row mb-2">
        @foreach(\App\Models\Articles::all() as $article)
            @if($article->published == true)
                <div class="col-md-6">
                    <div
                        class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary">{{ $article->type }}</strong>
                            <h3 class="mb-0">{{ $article->title }}</h3>
                            <div class="mb-1 text-muted">{{ $article->created_at }}</div>
                            <p class="card-text mb-auto">{{ mb_substr($article->content, 0, 140) }}</p>
                            <a href="/posts/{{ $article->getKey() }}" class="stretched-link">Читать дальше...</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                                 role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                                 focusable="false"><title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"></rect>
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Автор</text>
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection
