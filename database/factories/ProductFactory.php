<?php

namespace Database\Factories;

use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = $this->faker->sentence(2);
        return [
            'subCategory_id' =>SubCategory::select('id')->get()->random()->id,
            'product_name' =>$name,
            'product_slug' =>Str::slug($name),
            'product_sku' =>$this->faker->numberBetween(100,100000),
            'product_size' =>$this->faker->numberBetween(1,5),
            'product_price' =>$this->faker->numberBetween(100,1000),
            'product_cost' =>$this->faker->numberBetween(100,1000),
            'product_stock' =>$this->faker->numberBetween(5,100),
            'product_alertQuantity' =>$this->faker->numberBetween(1,10),
            'product_details' =>$this->faker->paragraph(6),
            'product_shippingDetails' =>$this->faker->paragraph(4),
            'product_image' =>"https:://picsum.photos/200",
            'product_thumbnail' =>"https:://picsum.photos/200",
            'product_rating' =>$this->faker->numberBetween(0,5),
        ];
    }
}
