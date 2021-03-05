<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use App\Models\Tags;

class TagController extends Controller
{
    public function filter(Tags $tag)
    {
        $articles = Articles::all();

        $arts = [];

        foreach ($articles as $article){
            foreach ($article->tags as $tags){
                if ($tags->name == $tag->name){
                    $arts[] = $article;
                    break;
                }
            }
        }
        return view('posts.post', ['articles' => $arts]);
    }
}
