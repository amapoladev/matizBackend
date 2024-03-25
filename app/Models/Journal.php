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
        'emotion_id',
        'journal_date',
        'intensity_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function intensity()
    {
        return $this->belongsTo(Intensity::class);
    }

    public function emotions()
    {
        return $this->belongsToMany(Emotion::class, 'users_emotions')
                    ->withPivot('intensity', 'journal_date')
                    ->withTimestamps();
    }
}
