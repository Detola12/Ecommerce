<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;

class ExampleController extends Controller
{
    public function getUserDetails(Request $request){
        Example::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'age' => $request->age,
        ]);
        return redirect()->back();
    }

    public function showPage(){
        $user = Example::first();
        return view('new', compact('user'));
    }
}
