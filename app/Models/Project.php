<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'tags',
        'focus',
        'outcome',
        'cover_image',
        'is_featured',
        'sort_order',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    public function scopeOrdered(Builder $query): Builder
    {
        return $query
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('title');
    }

    protected function coverUrl(): Attribute
    {
        return Attribute::get(function (): string {
            if ($this->hasCoverImage()) {
                if (str_starts_with((string) $this->cover_image, 'projects/')) {
                    return asset('storage/'.$this->cover_image);
                }

                return asset((string) $this->cover_image);
            }

            return placeholder_image_url();
        });
    }

    public function hasCoverImage(): bool
    {
        if (! filled($this->cover_image)) {
            return false;
        }

        if (str_starts_with($this->cover_image, 'projects/')) {
            return Storage::disk('public')->exists($this->cover_image);
        }

        return is_file(public_path($this->cover_image));
    }

    public function isStoredCover(): bool
    {
        return filled($this->cover_image) && str_starts_with($this->cover_image, 'projects/');
    }

    public static function clearFeatured(?int $exceptId = null): void
    {
        static::query()
            ->when($exceptId, fn (Builder $query) => $query->where('id', '!=', $exceptId))
            ->where('is_featured', true)
            ->update(['is_featured' => false]);
    }

    public static function makeSlug(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'project';
        $slug = $base;
        $counter = 2;

        while (
            static::query()
                ->when($ignoreId, fn (Builder $query) => $query->where('id', '!=', $ignoreId))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
