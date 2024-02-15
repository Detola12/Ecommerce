<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Like;
use App\Models\Product;
use App\Models\Rating;
use App\Models\Search;
use App\Models\Session;
use App\Models\User;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function home(){

        return view('index');
    }

    public function index(Request $request)
    {
        $auth = Auth::id();
        $sort = $request->query('sort_by');
        $search = $request->query('search');


        $products = Product::latest()->paginate(8);

        if ($sort){
            $products = Product::orderby($sort, 'asc')->paginate(8);
        }
        if ($search) {
            $products = Product::where('name', 'LIKE', "%{$search}%")->paginate(8);
            Search::create([
                'user_id' => Auth::id(),
                'search' => $search,
            ]);
        }
        if ($sort && $search){
            $products = Product::where('name', 'LIKE', "%{$search}%")->orderby($sort, 'asc')->paginate(8);
        }
        $category = Category::all();



        $recommend = app(FilteringController::class);
        $recommend = ($recommend->used($auth));

        $likes = Like::where('user_id', Auth::id())->pluck('product_id')->toArray();




        return view('shop.index', compact('products','category','recommend','likes'));
    }

    public function productCategory($id){
        $products = Product::where('category_id','=',$id)->get();

        $cat = Category::select('category_name')->where('id',$id)->first();
        $name = $cat->category_name;

        $category = Category::all();

        return view('shop.select', compact('products', 'name','category'));

    }

    public function create()
    {
        $user = User::where('id', Auth::id())->first();

        if($user->role_id != 1){
            return redirect()->back();
        }
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $name = $request->name;
        $category_id = $request->category_id;
        $price = $request->price;
        $description = $request->description;
        $slug = Str::slug($name, '-');


        if($request->file('photo')){

            $file = $request->file('photo');
            if ($file->getError()){
                return redirect()->back()->with('image','File is too large >2mb');
            }
//            dd(str_replace(' ','',$file));
            $ext = $file->extension();
            $filename = time().$slug.'.'.$ext;
            $bigimagepath = 'uploads/products/big';
            $thumbpath = 'uploads/products/thumb/'.$filename;

            $image = Image::make($file->getRealPath());

            $image->resize(300, null, function ($constraint){
                $constraint->aspectRatio();
            });

            $image->save($thumbpath);
            $file->move($bigimagepath,$filename);

            $product = new Product([
                'name' => $name,
                'category_id' => $category_id,
                'price' => $price,
                'slug' => $slug,
                'image' => $filename,
                'description' => $description
            ]);
            $product->save();
        }
        else{
            $product = new Product([
                'name' => $name,
                'category_id' => $category_id,
                'price' => $price,
                'slug' => $slug,
                'image' => '',
                'description' => $description
            ]);
            $product->save();
        }



        return redirect()->back()->with('message', 'Product Created Successfully');
    }

    public function searchProduct(){
        if(\request()->query('search')) {
            $products = Product::where(function ($query) {
                if ($search = \request()->query('search')) {
                    $query->where('name', 'LIKE', "%{$search}%");
                }

            })->get();


            return $products;
        }
        else{
            $products = $this->getProducts();
        }
    }

    public function getProducts(){
        return Product::latest()->get();
    }

    public function sortProducts($sortBy){
        return Product::orderBy($sortBy,'asc')->get();
    }

    public function detail($id){
        $products = Product::find($id);
        $ratings = null;
        if(Rating::where('user_id',Auth::id())->where('product_id',$id)->first()){
            $ratings = Rating::where('user_id',Auth::id())->where('product_id',$id)->first();
        }

            View::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
            ]);


        return view('shop.detail', compact('products','ratings'));
    }

    public function getRating(Request $request){
        dd('hello');
    }

//     public function add_to_cart($id){
//         $product = Product::find($id);
//         $value = session()->get('cart');
//         if(!$value){
//             $value = array(
//             $id => [
//                 'name' => $product->name,
//                 'price' => $product->price,
//                 'quantity' => 1
//             ]
//         );

//         $value = session()->put('cart', $value);
//     }

//     else if(isset($value)){
//         $value[$id] = [
//             'name' => $product->name,
//             'price' => $product->price,
//             'quantity' => 1
//         ];
//         $value = session()->put('cart',$value);
//     }
//     if(isset($value[$id])){
//         $value[$id]['quantity']++;
//     }

//     return redirect()->back()->with('success', 'Product added to cart successfully!');
// }

}
