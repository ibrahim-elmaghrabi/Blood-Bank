<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonationResource extends JsonResource
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
            "created_at" => $this->created_at,
            "name" => $this->name,
            "phone" => $this->phone,
            "hospital_name" => $this->hospital_name,
            "blood_type_id" => BasicDataResource::make($this->bl),
            "blood_type" => BasicDataResource::make($this->bloodType),
            "age" => $this->age,
            "bags_num" => $this->bags_num,
            "hospital_address" => $this->hospital_address,
            "details" => $this->details,
            "latitude" => $this->latitude,
            "longitude"=> $this->longitude,
            "client"=> BasicDataResource::make($this->client),
            "city_id" => CityResource::make($this->city),
            "city" => $this->relationLoaded('city')
            ? new CityResource($this->city)
            : null,//new CityResource($this->city),
        ];

    }
}
