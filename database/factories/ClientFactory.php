<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     protected $model = Client::class;
    public function definition()
    {
        return [
            'name' => 'mohamed ahmed',
            'phone' => '123456789',
            'email' => 'mo@gmail.com' ,
            'bloodType_id' => 1,
            'city_id' => 1 ,
            'd_o_b' => fake()->date() ,
            'last_donation_date' =>fake()->date() ,
            'password' => bcrypt('123456789')
        ];
    }
}
