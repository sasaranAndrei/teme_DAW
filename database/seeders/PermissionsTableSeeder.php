<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
          [
            'id' => 1,
            'title' => 'user_access',
          ],
          [
            'id' => 2,
            'title' => 'real_estate_access',
          ],
        ];

        Permission::insert($permissions);
    }
}
