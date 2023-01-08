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
            "id" => (string) $this->id,
            "attributes" => [
                "created_at" => $this->created_at,
                "updated_at" => $this->updated_at,
                "name" => $this->name,
                "phone" => $this->phone,
                "city_id" => $this->city_id,
                "hospital_name" => $this->hospital_name,
                "blood_type_id" => $this->blood_type_id,
                "age" => $this->age,
                "bags_num" => $this->bags_num,
                "hospital_address" => $this->hospital_address,
                "details"   => $this->details,
                "latitude"  => $this->latitude,
                "longitude" => $this->longitude,
                "client_id" => $this->client_id
            ],
            "relationships" =>[
                 "city" => $this->relationLoaded('city')
                 ? new CityResource($this->city)
                 : null,//new CityResource($this->city),
                 "blood_type" => new BloodTypeResource($this->bloodType)
                 
            ]
        ];
    }
}
