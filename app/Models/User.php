<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Emotion;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ...

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // public function emotions()
    // {
    //     return $this->belongsToMany(Emotion::class, 'users_emotions');
    // }

    public function emotions()
    {
        return $this->belongsToMany(Emotion::class, 'users_emotions')
            ->withPivot('intensity', 'journal_date');
    }
}