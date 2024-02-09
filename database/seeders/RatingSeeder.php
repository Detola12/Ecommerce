<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();
        $users = User::all();
        $ratings = [];

        foreach ($products as $product) {
            foreach ($users as $user) {
                $rating = [
                    'product_id' => $product->id,
                    'user_id' => $user->id,
                    'rating' => rand(0, 5),
                ];
                $ratings[] = $rating;
            }
        }

        Rating::insert($ratings);
    }
}
