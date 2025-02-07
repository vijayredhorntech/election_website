<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Title;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            [
                'name' => 'Mr'
            ],
            [
                'name' => 'Miss'
            ],
            [
                'name' => 'Mrs'
            ],
            [
                'name' => 'Ms'
            ],
            [
                'name' => 'Mx'
            ],
            [
                'name' => 'Admiral'
            ],
            [
                'name' => 'Air Commodore'
            ],
            [
                'name' => 'Air Marshal Sir'
            ],
            [
                'name' => 'Baron'
            ],
            [
                'name' => 'Baroness'
            ],
            [
                'name' => 'Brigadier'
            ],
            [
                'name' => 'Brother'
            ],
            [
                'name' => 'Canon'
            ],
            [
                'name' => 'Captain'
            ],
            [
                'name' => 'Chief'
            ],
            [
                'name' => 'Colonel'
            ],
            [
                'name' => 'Commander'
            ],
            [
                'name' => 'Councillor'
            ],
            [
                'name' => 'Dame'
            ],
            [
                'name' => 'Deacon'
            ],
            [
                'name' => 'Dr'
            ],
            [
                'name' => 'Father'
            ],
            [
                'name' => 'Flt Lt'
            ],
            [
                'name' => 'General'
            ],
            [
                'name' => 'His Grace Duke'
            ],
            [
                'name' => 'Hon Alderman'
            ],
            [
                'name' => 'Hon Mr'
            ],
            [
                'name' => 'Hon Mrs'
            ],
            [
                'name' => 'Inspector'
            ],
            [
                'name' => 'Judge'
            ],
            [
                'name' => 'Lady'
            ],
            [
                'name' => 'Lord'
            ],
            [
                'name' => 'Madam'
            ],
            [
                'name' => 'Major'
            ],
            [
                'name' => 'Major General'
            ],
            [
                'name' => 'Master'
            ],
            [
                'name' => 'Mayor'
            ],
            [
                'name' => 'Pastor'
            ],
            [
                'name' => 'Prince'
            ],
            [
                'name' => 'Prof'
            ],
            [
                'name' => 'Prof Sir'
            ],
            [
                'name' => 'Rabbi'
            ],
            [
                'name' => 'Rev'
            ],
            [
                'name' => 'Rev Dr'
            ],
            [
                'name' => 'Rt Hon'
            ],
            [
                'name' => 'Rt Hon Baroness'
            ],
            [
                'name' => 'Rt Hon Lord'
            ],
            [
                'name' => 'Rt Hon Sir'
            ],
            [
                'name' => 'Rt Rev'
            ],
            [
                'name' => 'Sgt'
            ],
            [
                'name' => 'Sir'
            ],
            [
                'name' => 'The Earl of'
            ],
            [
                'name' => 'The Hon'
            ],
            [
                'name' => 'The Right Hon the Earl of'
            ],
            [
                'name' => 'The Ven'
            ],
            [
                'name' => 'The Viscount'
            ],
            [
                'name' => 'Wing Commander'
            ],
        ];

        foreach ($titles as $title) {
            Title::create($title);
        }
    }
}
