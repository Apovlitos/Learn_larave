<?php

namespace App\Http\Requests;

use App\Models\Articles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class Requester extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:50',
            'type' => 'required',
            'content' => 'required|min:5|',
            'description' => 'required',
            'slug' => Rule::unique("articles")->ignore($this->route()->parameter('post'))
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
