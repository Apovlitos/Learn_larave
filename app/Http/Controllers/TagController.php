<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Tags;

class TagController extends Controller
{
    public function filter(Tags $tag)
    {
        $arts = [];

        foreach ($tag->articles as $art){
            $arts[] = $art;
        }
        return view('posts.post', ['articles' => $arts]);
    }
}
