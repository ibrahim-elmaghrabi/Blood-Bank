<?php

namespace App\Http\Resources;

use App\Http\Resources\BasicDataResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "image" => $this->image,
            "content" => $this->content,
          //  "is_favorite" => $this->is_favourite,
            "category" => BasicDataResource::make($this->category),
        ];
    }
}
