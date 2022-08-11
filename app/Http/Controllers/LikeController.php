<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Http\Resources\ReplyResource;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt');
    }


    public function like(Reply $reply)
    {
        $reply->likes()->create([
                'user_id'=>1
            ]
        );
        return ReplyResource::make($reply);
    }

    public function unlike(Reply $reply)
    {
        $userId = 1; //auth()->id;
        $reply->likes()->where('user_id', $userId)->first()->delete();
    }

}
