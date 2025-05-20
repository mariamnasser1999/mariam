<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = ['food', 'travel', 'financial', 'fashoin','photos'];
        foreach ($Categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }
}
