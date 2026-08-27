<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        foreach (['email', 'notification_email', 'phone', 'phone_link', 'address', 'hours', 'response_note'] as $field) {
            if ($this->input($field) === '') {
                $this->merge([$field => null]);
            }
        }
    }

    public function rules(): array
    {
        return [
            'email' => ['nullable', 'email', 'max:160'],
            'notification_email' => ['nullable', 'email', 'max:160'],
            'phone' => ['nullable', 'string', 'max:40'],
            'phone_link' => ['nullable', 'string', 'max:40'],
            'address' => ['nullable', 'string', 'max:160'],
            'hours' => ['nullable', 'string', 'max:120'],
            'response_note' => ['nullable', 'string', 'max:160'],
        ];
    }
}
