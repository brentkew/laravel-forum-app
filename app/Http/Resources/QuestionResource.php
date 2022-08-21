<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use App\Http\Resources\ReplyResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {       
        // return parent::toArray($request);
        $key = rand(1,1000);
        $category = array();
        if(!empty($this->category))
            $category = array($this->category['name'],$this->category['slug']);
        
        return [
            'key' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'path' => $this->path,
            'body' => $this->body,
            'user' => $this->user->name,
            'user_id' => $this->user->id,
            'created_at' => $this->created_at->diffForHumans(),
            'category' => $category,
            'replies' => ReplyResource::collection($this->replies),
            'replies_count' => $this->replies->count()
        ];
    }
}
