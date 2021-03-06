<?php

namespace App\Http\Requests\LibraryMedia;

use App\Http\Requests\Request;
use App\Models\LibraryMediaFile;

class FileUpdateRequest extends Request
{
    protected $safetyChecks = [
        'downloadable' => 'boolean',
    ];

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id'  => ['required', 'integer', 'exists:library_media_categories,id'],
            'media'        => (new LibraryMediaFile)->validationConstraints('medias'),
            'name'         => ['required', 'string', 'max:255'],
            'downloadable' => ['required', 'boolean'],
        ];
    }
}
