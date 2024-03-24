<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'feelingsnotes',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function intensity()
    {
        return $this->belongsTo(Intensity::class);
    }

    public function emotion()
    {
        return $this->belongsTo(Emotion::class);
    }
}
