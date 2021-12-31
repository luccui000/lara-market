<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::select('name')->get();
        $arrCategory = array_map(function($item) {
            return $item['name'];
        }, $categories->toArray());
        $categoriesFlipped = array_flip($arrCategory);

        $products = Http::get("https://fakestoreapi.com/products")->collect();

        $arrProducts = $products->map(function($item, $key) use ($categoriesFlipped) {
            return [
                'name' => $item['title'],
                'description' => $item['description'],
                'category_id' => 1,
                'thumbnail' => $item['image'],
            ];
        });
//        dd($arrProducts->toArray());
        Product::insert($arrProducts->toArray());
    }
}
