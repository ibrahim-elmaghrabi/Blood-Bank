<?php

namespace App\Http\Resources;

use App\Http\Resources\BasicDataResource;
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
            "age" => $this->age,
            "bags_num" => $this->bags_num,
            "hospital_address" => $this->hospital_address,
            "details" => $this->details,
            "latitude" => $this->latitude,
            "longitude"=> $this->longitude,
            "blood_type" =>  $this->relationLoaded('bloodType') ?  BasicDataResource::make($this->bloodType) : null,
            "client"=>  $this->relationLoaded('client') ?  BasicDataResource::make($this->client) : null,
            "city" => $this->relationLoaded('city') ?  CityResource::make($this->city) : null,
        ];

    }
}
