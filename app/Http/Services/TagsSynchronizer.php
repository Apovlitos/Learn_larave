<?php


namespace App\Http\Services;


use App\Http\Requests\Requester;
use App\Models\Articles;
use App\Models\Tags;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, Articles $post)
    {
        $artTags = $post->tags->keyBy('name');

        $tagsToAtach = $tags->diffKeys($artTags);
        $tagsToDetach = $artTags->diffKeys($tags);


        foreach ($tagsToAtach as $tag){
            $tag = Tags::firstOrCreate(['name' => $tag]);
            $post->tags()->attach($tag);
        }

        foreach ($tagsToDetach as $tag) {
            $post->tags()->detach($tag);
        }
    }

    public function parse($string){
        foreach (explode('#', $string) as $tag){
            $tags[] = trim($tag);
        }
        array_shift($tags);

        $tags = collect($tags)->keyBy(function ($item) { return $item; } );

        return $tags;
    }
}
