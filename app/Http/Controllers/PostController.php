<?php

namespace App\Http\Controllers;

use App\Http\Requests\Requester;
use App\Models\Articles;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.post', ['articles' => Articles::all()]);
    }

    public function create(Articles $art)
    {
        return view('posts.create', ['article' => $art]);
    }

    public function store(Requester $request)
    {
        Articles::create($request->all());

        return redirect(route('posts.index'));
    }

    public function show(Articles $post)
    {
        return view('posts.show', ['article' => $post]);
    }

    public function edit(Articles $post)
    {
        return view('posts.edit', ['article' => $post]);
    }

    public function update(Requester $request, Articles $post)
    {
        $post->update($request->all());

        return redirect(route('posts.index'));
    }

    public function destroy(Articles $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
