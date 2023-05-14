<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class DonationRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = DonationRequest::class;
    public function definition()
    {

            return [
            'name' => $this->faker->name,
            "phone" => $this->faker->phoneNumber(),
            "city_id" => 1,
            'hospital_name' => $this->faker->name,
            "hospital_address" => $this->faker->text(),
            "details" => $this->faker->text(200),
            "latitude" => $this->faker->latitude(),
            "longitude" => "0.65987484478",
            "blood_type_id" => 1,
            "age" => "25",
            "bags_num" => $this->faker->numberBetween(1, 10),
            "client_id" => 1
        ];
    }
}
