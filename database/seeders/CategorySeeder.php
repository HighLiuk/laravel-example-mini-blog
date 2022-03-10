<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::truncate();

        $categories = [
            'News',
            'Opinion',
            'Tutorial',
            'Review',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
