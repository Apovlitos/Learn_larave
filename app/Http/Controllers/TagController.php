<?php

namespace App\Http\Controllers;

use App\Models\Tags;

class TagController extends Controller
{
    public function filter(Tags $tags){
        return view('posts.show');
    }
}
