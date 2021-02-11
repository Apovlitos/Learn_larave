<?php

namespace App\Http\Requests;

use App\Models\Articles;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateFormRequester extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:50',
            'type' => 'required',
            'content' => 'required|min:5|',
            'description' => 'required'
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

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $article = new Articles();

            $slug = $article::getSlug($this->request->get('title'));

            $query = DB::table($article->getTable())->where($article->getKeyName(), '=', $slug)->get();
            if (!$query->isEmpty())
                $validator->errors()->add('field', 'This title is exists');
        });
    }
}
