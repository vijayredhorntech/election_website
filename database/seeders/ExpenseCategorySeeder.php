<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExpenseCategory;
use App\Models\User;

class ExpenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::first();
        $expenseCategories = [
            [
                'name' => 'Transport',
                'user_id' => $user->id,
            ],
            [
                'name' => 'Office Supplies',
                'user_id' => $user->id,
            ],
            [
                'name' => 'Stationery',
                'user_id' => $user->id,
            ],
            [
                'name' => 'Printing',
                'user_id' => $user->id,
            ],
            [
                'name' => 'Other',
                'user_id' => $user->id,
            ],
        ];
        foreach ($expenseCategories as $expenseCategory) {
            ExpenseCategory::create(['name' => $expenseCategory['name'], 'user_id' => $expenseCategory['user_id']]);
        }
    }
}
