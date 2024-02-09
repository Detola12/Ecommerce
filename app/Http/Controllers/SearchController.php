<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getSearch(Request $request){
        $sort = $request->query('sort_by');
        $search = $request->query('search');



        if ($sort){
            $products = Product::orderby($sort, 'asc')->get();
            }
        if ($search) {
            $products = Product::where('name', 'LIKE', "%{$search}%")->get();

        }
        if ($sort && $search){
            $products = Product::where('name', 'LIKE', "%{$search}%")->orderby($sort, 'asc')->get();
        }

            $category = Category::all();


        return view('shop.index', compact('products','category'));

    }
}
