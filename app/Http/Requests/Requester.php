<?php

namespace App\Http\Requests;

use App\Models\Articles;
use Illuminate\Foundation\Http\FormRequest;

class Requester extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:50',
            'type' => 'required',
            'content' => 'required|min:5|',
            'description' => 'required',
            'slug' => 'unique:articles'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Articles::getSlug($this->title),
            'author_id' => 1,
            'published' => $this->request->get('published') == 'on'
        ]);
    }
}
