<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|string',
            'content'       => 'required|string',
            'preview_image' => 'required|file',
            'main_image'    => 'required|file',
            'category_id'   => 'integer|exists:categories,id',
            'tag_ids'       => 'nullable|array',
            'tag_ids.*'     => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'         => 'This field is required',
            'title.string'           => 'Field should be string',
            'content.required'       => 'This field is required',
            'content.string'         => 'Field should be string',
            'preview_image.required' => 'This field is required',
            'preview_image.file'     => 'Field should be file',
            'main_image.required'    => 'This field is required',
            'main_image.file'        => 'Field should be file',
            'category_id.integer'    => 'Field should be integer',
            'tag_ids.array'          => 'Field should be array',
        ];
    }
}
