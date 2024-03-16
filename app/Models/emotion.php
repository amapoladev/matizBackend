<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emotion extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'emotion',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class, 'users_emotions', 'emotion_id', 'user_id');
    }
}
