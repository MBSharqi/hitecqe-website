<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePageContentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $page = (string) $this->route('page');

        $rules = [
            'sections' => ['required', 'array'],
            'sections.*' => ['array'],
        ];

        return match ($page) {
            'home' => array_merge($rules, [
                'sections.hero.slides' => ['nullable', 'array'],
                'sections.hero.slides.*.title' => ['nullable', 'string', 'max:160'],
                'sections.hero.slides.*.accent' => ['nullable', 'string', 'max:160'],
                'sections.hero.slides.*.lead' => ['nullable', 'string', 'max:1000'],
                'sections.hero.trust' => ['nullable', 'array'],
                'sections.hero.trust.*' => ['nullable', 'string', 'max:160'],
                'sections.stats.items' => ['nullable', 'array'],
                'sections.stats.items.*.value' => ['nullable', 'integer', 'min:0', 'max:999999'],
                'sections.stats.items.*.suffix' => ['nullable', 'string', 'max:20'],
                'sections.stats.items.*.label' => ['nullable', 'string', 'max:160'],
                'sections.advantages.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.advantages.title' => ['nullable', 'string', 'max:160'],
                'sections.advantages.lead' => ['nullable', 'string', 'max:1000'],
                'sections.advantages.cards' => ['nullable', 'array'],
                'sections.advantages.cards.*.title' => ['nullable', 'string', 'max:160'],
                'sections.advantages.cards.*.body' => ['nullable', 'string', 'max:1000'],
            ]),
            'about' => array_merge($rules, [
                'sections.hero.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.hero.title' => ['nullable', 'string', 'max:160'],
                'sections.hero.lead' => ['nullable', 'string', 'max:1000'],
                'sections.story.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.story.title' => ['nullable', 'string', 'max:160'],
                'sections.story.paragraphs' => ['nullable', 'array'],
                'sections.story.paragraphs.*' => ['nullable', 'string', 'max:2000'],
                'sections.beliefs.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.beliefs.title' => ['nullable', 'string', 'max:160'],
                'sections.beliefs.items' => ['nullable', 'array'],
                'sections.beliefs.items.*.title' => ['nullable', 'string', 'max:160'],
                'sections.beliefs.items.*.body' => ['nullable', 'string', 'max:1000'],
                'sections.focus.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.focus.title' => ['nullable', 'string', 'max:160'],
                'sections.focus.lead' => ['nullable', 'string', 'max:1000'],
                'sections.focus.points' => ['nullable', 'array'],
                'sections.focus.points.*' => ['nullable', 'string', 'max:240'],
                'sections.cta.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.cta.title' => ['nullable', 'string', 'max:160'],
                'sections.cta.lead' => ['nullable', 'string', 'max:1000'],
            ]),
            'services' => array_merge($rules, [
                'sections.hero.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.hero.title' => ['nullable', 'string', 'max:160'],
                'sections.hero.lead' => ['nullable', 'string', 'max:1000'],
                'sections.engineering.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.engineering.title' => ['nullable', 'string', 'max:160'],
                'sections.engineering.lead' => ['nullable', 'string', 'max:1000'],
                'sections.engineering.points' => ['nullable', 'array'],
                'sections.engineering.points.*' => ['nullable', 'string', 'max:240'],
                'sections.design.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.design.title' => ['nullable', 'string', 'max:160'],
                'sections.design.lead' => ['nullable', 'string', 'max:1000'],
                'sections.design.points' => ['nullable', 'array'],
                'sections.design.points.*' => ['nullable', 'string', 'max:240'],
                'sections.offerings.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.offerings.title' => ['nullable', 'string', 'max:160'],
                'sections.offerings.items' => ['nullable', 'array'],
                'sections.offerings.items.*.title' => ['nullable', 'string', 'max:160'],
                'sections.offerings.items.*.body' => ['nullable', 'string', 'max:1000'],
                'sections.process.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.process.title' => ['nullable', 'string', 'max:160'],
                'sections.process.lead' => ['nullable', 'string', 'max:1000'],
                'sections.process.steps' => ['nullable', 'array'],
                'sections.process.steps.*.title' => ['nullable', 'string', 'max:160'],
                'sections.process.steps.*.body' => ['nullable', 'string', 'max:1000'],
                'sections.cta.eyebrow' => ['nullable', 'string', 'max:80'],
                'sections.cta.title' => ['nullable', 'string', 'max:160'],
                'sections.cta.lead' => ['nullable', 'string', 'max:1000'],
            ]),
            default => $rules,
        };
    }
}
