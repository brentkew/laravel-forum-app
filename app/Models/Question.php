<?php

namespace App\Models;

use App\Models\User;
use App\Models\Reply;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug','body','category_id','user_id'];

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
        return $this->hasMany(Reply::class)->orderBy('id','desc');
    }

    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

    


}
