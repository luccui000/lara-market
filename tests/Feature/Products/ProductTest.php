<?php

namespace Tests\Feature\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
    */
    public function it_create_a_new_product()
    {
        Product::factory()->create();
        $this->assertDatabaseCount('products', 1);
    }
    /**
     * @test
    */
    public function it_create_a_new_product_with_one_category()
    {
        $product = Product::factory()->create();
        $category = Category::factory()->create();
        $product->categories->attach($category);
        $this->assertDatabaseHas('categories_products', [
            'product_id' => $product->id,
            'category_id' => $category->id,
        ]);
    }
}
