<?php

namespace App\Models;

use App\Models\Like;
use App\Models\User;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'body', 'question_id', 'user_id'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
