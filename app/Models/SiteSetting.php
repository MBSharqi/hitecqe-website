<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'email',
        'notification_email',
        'phone',
        'phone_link',
        'address',
        'hours',
        'response_note',
    ];

    public static function current(): self
    {
        $defaults = config('content.settings', []);

        return static::query()->firstOrCreate(
            ['id' => 1],
            $defaults
        );
    }

    public function resolved(): array
    {
        $defaults = config('content.settings', []);
        $email = $this->email ?: ($defaults['email'] ?? '');

        return [
            'email' => $email,
            'notification_email' => $this->notification_email
                ?: ($defaults['notification_email'] ?? $email),
            'phone' => $this->phone ?: ($defaults['phone'] ?? ''),
            'phone_link' => $this->phone_link ?: ($defaults['phone_link'] ?? ''),
            'address' => $this->address ?: ($defaults['address'] ?? ''),
            'hours' => $this->hours ?: ($defaults['hours'] ?? ''),
            'response_note' => $this->response_note ?: ($defaults['response_note'] ?? ''),
        ];
    }
}
