<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
            ['name' => "men's clothing", 'description' => "men's clothing", "thumbnail" => "", "created_at" => now(), "updated_at" => now()],
            ['name' => "women's clothing", 'description' => "women's clothing", "thumbnail" => "", "created_at" => now(), "updated_at" => now()],
            ['name' => "jewelery", 'description' => "jewelery", "thumbnail" => "", "created_at" => now(), "updated_at" => now()],
            ['name' => "electronics", 'description' => "electronics", "thumbnail" => "", "created_at" => now(), "updated_at" => now()],
        ]);
    }
}
