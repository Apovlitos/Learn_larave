<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormRequester;
use App\Http\Requests\UpdateRequester;
use App\Models\Articles;
use App\Models\Types;

class PostController extends Controller
{
    /**
     * Display a listing of the resource
     */
    public function index()
    {
        return view('posts.post');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create', ['types' => Types::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CreateFormRequester $request)
    {
        Articles::create($request->all());

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Articles  $posts
     */
    public function show(Articles $post)
    {
        return view('posts.show', ['article' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Articles $posts
     */
    public function edit(Articles $post)
    {
        return view('posts.edit', ['article' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Articles  $post
     */
    public function update(UpdateRequester $request, Articles $post)
    {
        $post->update($request->all());

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Articles  $post
     */
    public function destroy(Articles $post)
    {
        $post->delete();

        return redirect(route('posts.index'));
    }
}
