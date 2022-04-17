<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
              'id' => 1,
              'title' => 'Admin',
            ],
            [
              'id' => 2,
              'title' => 'User',
            ],
          ];
  
          Role::insert($roles);
    }
}
