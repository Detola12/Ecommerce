<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        $random = $this->faker->numberBetween(1,10);
        return[
        

                'name' => $this->faker->word,

                'description' => $this->faker->sentence,

                'image' => 'product1'.'('.$random.')'.'.jpg',

                'slug' => $this->faker->slug,

                'category_id' => 1,

                'price' => $this->faker->numberBetween(1000, 1000000),

                'created_at' => now(),

                'updated_at' => now(),

            

       
 
        ];
        

    
}

}