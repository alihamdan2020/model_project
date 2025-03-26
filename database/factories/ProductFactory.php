<?php

namespace Database\Factories;

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
    public function definition(): array
    {
        return [
           'product_name'=>$this->faker->name,
           'category_id'=>$this->faker->numberBetween(12,20),
           'product_price'=>$this->faker->randomFloat(1,10,100),
           'product_description'=>$this->faker->text,
           'product_photo'=>'https://placehold.co/600x400?text=Hello+World',
           'color1'=>'red',
           'color2'=>'blue',
           'color3'=>'green',
        ];
    }
}
