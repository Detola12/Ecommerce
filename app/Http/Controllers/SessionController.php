<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SessionController extends Controller
{
    public function home(){
        $products = Product::orderByDesc('ratings')->take(5)->get();
        $hproducts = Product::limit(8)->get();
        $likes = Like::where('user_id', Auth::id())->pluck('product_id')->toArray();

        $likedProducts = Product::whereIn('id',$likes)->get();
        $topLiked = Product::orderByDesc('ratings')->take(8)->get();

        return view('index',compact('products','hproducts','likedProducts','topLiked'));
    }

    public function saveRating(Request $request, $id){
        $rate = $request->rate;

        Rating::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'rating' => $rate
        ]);

        return redirect()->back();
    }
}
