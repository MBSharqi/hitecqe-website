<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SiteImage extends Model
{
    protected $fillable = [
        'slot',
        'path',
    ];

    public function url(): ?string
    {
        if (! $this->path) {
            return null;
        }

        return asset('storage/'.$this->path);
    }

    public function deleteStoredFile(): void
    {
        if ($this->path && Storage::disk('public')->exists($this->path)) {
            Storage::disk('public')->delete($this->path);
        }
    }
}
