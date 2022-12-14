<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','body','category_id','user_id'];
    protected $with = ['replies'];


    protected static function boot()
    {
        parent::boot();
        static::creating(function($question){
            $question->slug = Str::slug($question->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class)->orderBy('id','desc')->latest();
    }

    public function getPathAttribute()
    {
        return "/question/$this->slug";
    }

    


}
