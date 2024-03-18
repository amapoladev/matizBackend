<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emotion',
        'emotion_url'
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_emotions', 'emotion_id', 'user_id');
    }
}
