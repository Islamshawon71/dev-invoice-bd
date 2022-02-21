<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Super Admin',
            ],
            [
                'id'    => 2,
                'title' => 'Free Package',
            ],
            [
                'id'    => 3,
                'title' => 'Basic Package',
            ],
            [
                'id'    => 4,
                'title' => 'Standard Package',
            ],
            [
                'id'    => 5,
                'title' => 'Advance Package',
            ],
        ];

        Role::insert($roles);
    }
}
