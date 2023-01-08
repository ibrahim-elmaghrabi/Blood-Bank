<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
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
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "name" => $this->name,
                "email" => $this->email,
                "phone" => $this->phone,
                "date of birth" => $this->d_o_b,
                "last donation date" => $this->last_donation_date,
                "active" => $this->active,
            ],
            "relationships" => [
                "city" => new CityResource($this->city),
                "blood type" => new BloodTypeResource($this->bloodType)
            ]
        ];
    }
}
