<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEmotion extends Model
{
    use HasFactory;

    protected $table = 'users_emotions';

    protected $fillable = [
        'user_id',
        'emotion_id',
        'intensity',
        'journal_date',
    ];
}
