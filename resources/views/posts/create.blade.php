@extends('layout')

@section('title', 'Создать статью')

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
        @include('form.form')
    </form>
@endsection
