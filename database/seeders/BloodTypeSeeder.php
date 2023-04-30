<?php

namespace Database\Seeders;

use App\Models\BloodType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BloodType::create(['name' => 'A+']);
        BloodType::create(['name' => 'A-']);
        BloodType::create(['name' => 'B+']);
        BloodType::create(['name' => 'B-']);
        BloodType::create(['name' => 'AB+']);
        BloodType::create(['name' => 'AB-']);
        BloodType::create(['name' => 'O+']);
        BloodType::create(['name' => 'O-']);







    }
}
