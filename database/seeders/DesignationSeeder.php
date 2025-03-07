<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Designation;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            [
                'name' => 'In Charge',
                'description' => 'In Charge of the office'
            ],
            [
                'name' => 'Assistant',
                'description' => 'Assistant of the office'
            ],
            [
                'name' => 'Secretary',
                'description' => 'Secretary of the office'
            ],
            [
                'name' => 'Treasurer',
                'description' => 'Treasurer of the office'
            ],
            [
                'name' => 'Auditor',
                'description' => 'Auditor of the office'
            ],
        ];
        foreach ($designations as $designation) {
            Designation::create(['name' => $designation['name'], 'description' => $designation['description']]);
        }
    }
}
