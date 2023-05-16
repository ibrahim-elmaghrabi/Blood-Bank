<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'contacts-list']);
        Permission::create(['name' => 'contacts-show']);
        Permission::create(['name' => 'contacts-delete']);
        Permission::create(['name' => 'clients-list']);
        Permission::create(['name' => 'clients-updateStatus']);
        Permission::create(['name' => 'clients-show']);
        Permission::create(['name' => 'categories-list']);
        Permission::create(['name' => 'categories-create']);
        Permission::create(['name' => 'categories-edit']);
        Permission::create(['name' => 'categories-delete']);
        Permission::create(['name' => 'governorates-list']);
        Permission::create(['name' => 'governorates-create']);
        Permission::create(['name' => 'governorates-edit']);
        Permission::create(['name' => 'governorates-delete']);
        Permission::create(['name' => 'cities-list']);
        Permission::create(['name' => 'cities-create']);
        Permission::create(['name' => 'cities-edit']);
        Permission::create(['name' => 'cities-delete']);
        Permission::create(['name' => 'blood_types-list']);
        Permission::create(['name' => 'blood_types-create']);
        Permission::create(['name' => 'blood_types-edit']);
        Permission::create(['name' => 'blood_types-delete']);
        Permission::create(['name' => 'users-list']);
        Permission::create(['name' => 'users-create']);
        Permission::create(['name' => 'users-edit']);
        Permission::create(['name' => 'users-delete']);
        Permission::create(['name' => 'posts-list']);
        Permission::create(['name' => 'posts-create']);
        Permission::create(['name' => 'posts-edit']);
        Permission::create(['name' => 'posts-delete']);
        Permission::create(['name' => 'roles-list']);
        Permission::create(['name' => 'roles-create']);
        Permission::create(['name' => 'roles-edit']);
        Permission::create(['name' => 'roles-delete']);
        Permission::create(['name' => 'donations-list']);
        Permission::create(['name' => 'donations-show']);
        Permission::create(['name' => 'donations-delete']);
    }
}
