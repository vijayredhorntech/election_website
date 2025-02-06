<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\FinancialYear;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed roles
        $this->call(RoleSeeder::class);

        // Seed a Super Admin user
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'role' => 'admin'

        ]);

        // Seed financial years from 2025-2026 to 2039-2040
        $firstYear = 2025; // Define the first financial year to be active
        for ($startYear = 2025; $startYear <= 2039; $startYear++) {
            $endYear = $startYear + 1;
            FinancialYear::create([
                'year' => "$startYear-$endYear",
                'active' => ($startYear == $firstYear) ? 1 : 0, // Set the first year as active
            ]);
        }
    }
}
