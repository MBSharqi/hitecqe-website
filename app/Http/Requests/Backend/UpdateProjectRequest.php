<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
            'sort_order' => $this->input('sort_order', 0) === '' ? 0 : $this->input('sort_order', 0),
            'tags' => $this->input('tags') === '' ? null : $this->input('tags'),
            'focus' => $this->input('focus') === '' ? null : $this->input('focus'),
            'outcome' => $this->input('outcome') === '' ? null : $this->input('outcome'),
            'remove_cover' => $this->boolean('remove_cover'),
        ]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:160'],
            'description' => ['required', 'string'],
            'tags' => ['nullable', 'string', 'max:200'],
            'focus' => ['nullable', 'string', 'max:160'],
            'outcome' => ['nullable', 'string', 'max:200'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],
            'remove_cover' => ['nullable', 'boolean'],
            'is_featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0', 'max:9999'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ];
    }
}
