<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilteringController extends Controller
{
    public function __construct()
    {
        //Get average ratings for each products
        $avg = DB::table('ratings')->select(DB::raw('product_id,AVG(rating) as rating'))->groupBy('product_id')->get();


        //Update rating of each products in the database
        foreach($avg as $item){
            $id = $item->product_id;
            $rating = $item->rating;
            DB::table('products')->where('id',$id)->update(['ratings' => $rating]);
        }
    }

    //Not Important
    public function filter()
    {
//        DB::raw('SUM(rating) as rating')
        $x = $y = 0;
        $x = rand(1, 3);
        $y = rand(1, 3);
        if ($x == $y) {
            $y = rand(1, 3);
        }

        $user1 = DB::table('ratings')->select('name', 'firstname', 'rating')
            ->join('products', 'ratings.product_id', 'products.id')
            ->join('users', 'users.id', 'ratings.user_id')
            ->where('user_id', '=', $x)
            ->get();
        $user2 = DB::table('ratings')->select('name', 'firstname', 'rating')
            ->join('products', 'ratings.product_id', 'products.id')
            ->join('users', 'users.id', 'ratings.user_id')
            ->where('user_id', '=', $y)
            ->get();

        $rate = [];
        $sum = 0;

        $arrNames = [];
        $arrProduct = [];
        $arrRating = [];
        $name = '';


        $sim = [];
        foreach ($user1 as $item1) {
            foreach ($user2 as $item2) {
                $sim[] = $this->cosine_similarity($user1, $user2);
            }
        }

        dd($sim);


//        foreach ($ratings as $rating){
//            $arrNames[] = $rating->firstname;
//            $arrProduct[] = $rating->name;
//            $arrRating[] = $rating->rating;
//
//        }


    }


    public function getRecommendations(User $user, $num = 4){

        //Get all users who rated the same items as the target user

        $similarUsers = User::whereHas('ratings', function($query) use ($user){
            $query->whereIn('product_id', $user->ratings->pluck('product_id'));
        })->where('id','<>', $user->id)->get();




        $recommendations = [];
        $similarity = [];

        //Calculate the similarity for each users
        foreach($similarUsers as $similarUser){
            $similarity[$similarUser->id] = $this->cosineSimilarity($user, $similarUser);
        }
        arsort($similarity);


        foreach(array_keys($similarity) as $i){
            $recommendations[] = Rating::where('user_id',$i)->orderBy('rating','desc')->pluck('product_id')->take(3)->toArray();
        }



//Not Important
        foreach($recommendations as $x){
            foreach($x as $new){
                $list[] = $new;
            }
        }

        if(!isset($list)){
            return $recommendations;
        }
//Dinstint Values
        array_unique($list);




        $recommendedItems = Product::whereIn('id', $list)->get();


        return $recommendedItems;

    }

    public function cosineSimilarity(User $user1, User $user2)
    {
        $rating1 = $user1->ratings->pluck('rating')->toArray();
        $rating2 = $user2->ratings->pluck('rating')->toArray();

        $dotProduct = array_sum(array_map(function($a, $b){
            return $a * $b;
        }, $rating1, $rating2));


        $magnitude1 = sqrt(array_sum(array_map(function($a){
            return $a * $a;
        }, $rating1)));

        $magnitude2 = sqrt(array_sum(array_map(function($a){
            return $a * $a;
        }, $rating2)));


        return $dotProduct/($magnitude1 * $magnitude2);
    }



    public function used($id){
        $user = User::find($id);
        if (Rating::where('user_id',$id)->exists()){

            $recommendations = $this->getRecommendations($user, 1);
            if($recommendations){

            }
            else{
                $recommendations = Product::orderBy('rating','desc')->take(8);
            }
        }
        else{
            $recommendations = Product::orderBy('rating','desc')->take(8);
        }

        if ($recommendations == []){
            $recommendations = DB::table('likes')->selectRaw('product_id,sum(liked) as liked')
                ->where('liked','=',1)->groupByRaw('product_id')->orderByDesc('liked')->get();
        }




        return $recommendations;
    }


}

