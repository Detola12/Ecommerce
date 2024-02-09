<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function all()
    {

    }

    public function create()
    {
        $user = User::where('id', Auth::id())->first();
     
        if($user->role_id != 1){
            return redirect()->back();
        }
        return view('category.create');
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $parent_id = $request->parent_id;

        if ($parent_id > 0){
            $parent = $parent_id;
            $this->children($parent);
        }
        else{
            $parent = 0;
        }

        $category = new Category();

        $category->create([
            'category_name' => $name,
            'parent_id' => $parent
        ]);

        return redirect()->back()->with('message', 'Category Created Successfully');
    }

    public function children($parent_id)
    {
        $cat = Category::where('id','=',$parent_id)->first();
        $cat->has_children += 1;
        $cat->save();

    }
}
