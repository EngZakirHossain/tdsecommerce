<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subCategory_name = $this->faker->name;
        return [
            'category_id'=>Category::select('id')->get()->random()->id,
            'name'=>$subCategory_name,
            'slug'=> Str::slug($subCategory_name),
            'is_active'=> 0,
        ];
    }
}
