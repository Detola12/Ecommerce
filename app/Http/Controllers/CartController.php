<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index(){

        $total = 0;
        if(Session::has('cart')){
            $total = $this->get_total();
        }
        return view('partials._cart', compact('total'));
    }

    public function add_to_cart($id){
        $product = Product::find($id);
        $value = Session::get('cart',[]);

        if(isset($value[$id])){
            $value[$id]['quantity']++;
        }
        else{
            $value[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'image' => $product->image
            ];
        }

        Session::put('cart',$value);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    static public function get_total(){
        $value = Session::get('cart');
        $sum = 0;
        if($value) {
            foreach ($value as $id => $items) {
                $sum = ($items['price'] * $items['quantity']) + $sum;
            }
        }
        return $sum;
    }

    public function clear_cart(){
        Session::forget('cart');
        return redirect()->back();
    }
    public function remove_item($id){
        $value = Session::get('cart');
        $array = [];
        foreach ($value as $ids => $item){
                $array[$ids] = $item;
        }
        unset($array[$id]);
        Session::put('cart',$array);
        if (count(Session::get('cart')) == 0){
            Session::forget('cart');
        }

        return redirect()->back();
    }
}
