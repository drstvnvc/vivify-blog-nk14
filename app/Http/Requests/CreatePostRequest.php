<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|min:5|max:255',
            'body' => ['required', 'string', 'min:5'],
            'is_published' => 'integer|min:1|max:1',
            'tags' => 'required|array|min:1',
            'tags.*' => 'integer|exists:tags,id'
        ];
    }
}
