<?php

namespace App\Http\Requests\Backend;

use App\Models\SiteImage;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $slot = (string) $this->route('slot');
        $meta = SiteImage::slots()[$slot] ?? [];

        return [
            'image' => $meta['rules'] ?? ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ];
    }
}
