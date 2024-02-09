<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            [

                'name' => 'Samsung Galaxy',

                'description' => 'Samsung Brand',

                'image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',

                'slug' => 'Nil',

                'category_id' => 1,

                'price' => 1000

            ],

            [

                'name' => 'Apple iPhone 12',

                'description' => 'Apple Brand',

                'image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',

                'slug' => 'Nil',

                'category_id' => 1,

                'price' => 5000

            ],

            [

                'name' => 'Google Pixel 2 XL',

                'description' => 'Google Pixel Brand',

                'image' => 'https://dummyimage.com/200x300/000/fff&text=Google',

                'slug' => 'Nil',

                'category_id' => 1,

                'price' => 4000

            ],

            [

                'name' => 'LG V10 H800',

                'description' => 'LG Brand',

                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',

                'slug' => 'Nil',

                'category_id' => 1,

                'price' => 2000

            ]

        ];



        for($i = 0; $i < 1; $i++) {
            foreach ($products as $key => $value) {
                Product::create($value);
            }
        }
}
}
