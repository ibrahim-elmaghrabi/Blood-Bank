<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'donation-list']);
        Permission::create(['name' => 'donation-updateStatus']);
        Permission::create(['name' => 'donation-show']);
        Permission::create(['name'  => 'donation-delete']);

    }
}
