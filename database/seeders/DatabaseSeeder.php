<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BloodTypeSeeder::class,
            SettingSeeder::class,
            CategorySeeder::class,
            GovernorateSeeder::class,
            CitySeeder::class,
            PostSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
    }
}
