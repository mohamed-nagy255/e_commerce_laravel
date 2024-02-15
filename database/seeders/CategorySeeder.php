<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::insert([
            [
                'category_name' => 'Wemn Wear',
                'slug' => 'wemn-wear',
                'home_page' => 0,
                'image' => 'Wemn Wear.jpg',
            ],
            [
                'category_name' => 'Mens Wear',
                'slug' => 'mens-wear',
                'home_page' => 1,
                'image' => 'Mens Wear.jpg',
            ]
        ]);
    }
}
