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
            "id" => $this->id,
            "name"=> $this->name,
            "email"=> $this->email,
            "phone"=> $this->phone,
            "date_of_birth" => $this->d_o_b,
            "last_donation_date"=> $this->last_donation_date,
            "city"=> CityResource::make($this->city),
            "blood_type" => BasicDataResource::make($this->bloodType)
        ];
    }
}
