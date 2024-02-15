<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Session;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function dashboard(){
        if (Auth::check()){
            $user = Auth::user();
            $orders = Order::where('user_id', $user->id)->get();
        }
        else{
            return redirect()->back();
        }


        return view('dashboard',compact('user','orders'));
    }

    public function edit_details(Request $request){
        if ($request) {
            $request->validate(['firstname' => ['required', 'min:3']]);
            $request->validate(['lastname' => ['required', 'min:3']]);
            $request->validate(['email' => ['required', 'email', Rule::unique('users')]]);

            if ($request->old) {
                $old = $request->validate(['old' => ['required', 'min:6']]);
                $new = $request->validate(['password' => ['required', 'confirmed', 'min:6']]);
            }
        }
        else{
            return back();
        }


            if (Hash::check($request->old, Auth::user()->password)){
                \App\Models\User::update([
                    'firstname' => $request->firstname,
                    'lastname' => $request->lastname,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);
        }

        /*if ($request->firstname){
            $fname = $request->firstname;
        }
        if ($request->lastname){
            $lname = $request->lastname;
        }
        if ($request->email){
            $email = $request->email;
        }
        if ($request->old){
            $old = $request->validate(['old' => ['required','min:6']]);
            $new = $request->validate(['password' => ['required','confirmed','min:6']]);
        }*/

    }

    public function store(Request $request)
    {
        $userfields = $request->validate([
            'firstname' => ['required','min:3'],
            'lastname' => ['required','min:3'],
            'email' => ['required','email',Rule::unique('users')],
            'password' => ['required', 'confirmed' , 'min:6']
        ]);

        $userfields['password'] = Hash::make($userfields['password']);

        $user = \App\Models\User::create($userfields);

        auth()->login($user);

        return redirect('/')->with('message', 'User Created Successfully and Logged In');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function verify(Request $request)
    {
        $formfields = $request->validate([
            'email' => 'required|email' ,
            'password' => 'required'
        ]);

        if(auth()->attempt($formfields)){
            $request->session()->regenerate();

            return redirect('/dashboard')->with('message', 'You are now logged in');
        }


        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('input');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();

        return redirect('/')->with('message', 'You have been logged out');
    }
}
