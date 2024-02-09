<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function like($id){
        Like::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'liked' => 1,
        ]);
        return redirect()->back();
    }
}
