<?php

namespace App\Http\Resources;

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
            "id" => (string) $this->id,
            "attributes" => [
                "title" => $this->title,
                "image" => $this->image,
                "content" => $this->content,
                "is_favorite" => $this->is_favourite,
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at
            ],
            "relationships" => [
                "category" => new CategoryResource($this->category),
            ]
        ];
    }
}
