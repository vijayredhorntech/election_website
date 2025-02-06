<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'employee', 'member'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }
    }
}
