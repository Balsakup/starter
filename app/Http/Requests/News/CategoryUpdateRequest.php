<?php

namespace App\Http\Requests\News;

use App\Http\Requests\Request;

class CategoryUpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255', 'unique:news_categories,title,' . $this->category->id],
        ];
    }
}