<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReplyResource extends JsonResource
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
        return [
            'id' => $this->id,
            'reply' => $this->body,
            'question' => $this->question->title,
            'user' => $this->user->name,
            'user_id' => $this->user->id,
            'question_slug' => $this->question->slug,
            'like_count' => $this->likes->count(),
            'liked' => !! $this->likes->where('user_id', auth()->id())->count(),
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            
        ];
    }
}
