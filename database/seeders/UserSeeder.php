<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles = Role::pluck('id')->toArray();
        // $user = User::factory()->count(1)->create();
        // $user->roles()->attach($roles);


        $roles = Role::pluck('id')->toArray();
        $user = User::factory()->create(); // create a single user instance
        $user->roles()->attach($roles);    // call roles() on the user instance
    }
}
