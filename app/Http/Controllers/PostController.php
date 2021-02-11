<?php

namespace App\Http\Controllers;

use App\Classes\FormRequest;
use App\Http\Requests\FormRequester;
use App\Models\Articles;
use App\Models\Types;
use Illuminate\Http\Request;

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
    public function store(FormRequester $request)
    {



        Articles::create($val);

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
    public function update(Articles $post)
    {
        $val = $this->validate(\request(), [
            'title' => 'required|min:5|max:50',
            'type' => 'required',
            'content' => 'required|min:5|',
            'description' => 'required',
        ]);

        $pub = request('published') == 'on';

        $post->update($val + ['published' => $pub]);

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
