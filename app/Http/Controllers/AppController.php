<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Session;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Unicodeveloper\Paystack\Paystack;


class AppController extends Controller
{
    public function checkout(Request $request){
        if($request->session()->has('cart')){
            $value = $request->session()->get('cart');
        }
        return view('checkout',compact('value'));
    }

    public function payment_callback(Request $request){
        $response = json_decode($this->verify_payment(Request('reference')));
        if($response){
            if($response->status){
                $data = $response->data;
                return view('checkout', compact('data'));
            }
            else{
                return back()->with('status',$response->message);
            }
        }
        else{
            return back()->with('status',"Something is wrong");
        }
        return view('callback_page');
    }

    public function make_payment(Request $request){
        $value = $request->session()->get('cart');
        $formData = [];
        foreach ($value as $id => $items){
            $formData = [
                'name' => $items['name'],
                'amount' => $items['price'] * 100,
                'email' => 'emma@gmail.com',
                'callback_url' => url('/')
            ];
        }


        $pay = json_decode($this->initiate_payment($formData));
        if ($pay->status){
            foreach ($value as $id => $items) {
                Order::create([
                    'product_id' => $id,
                    'user_id' => Auth::id(),
                    'quantity' => $items['quantity'],
                    'cost' => $items['price']
                ]);
            }

            \Illuminate\Support\Facades\Session::forget('cart');
            return redirect($pay->data->authorization_url);
        }
        else{
            return back()->with('status',"Something is wrong");
        }
    }

    public function initiate_payment($formData){
        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);

        //open connection
        $ch = curl_init();

        if ($ch === false) {
            dd('failed to initialize');
        }


        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer sk_test_598b476c6066d289bc1d51140d4d5c0011437971",
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        return($result);
    }

    public function verify_payment($reference){
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer sk_test_598b476c6066d289bc1d51140d4d5c0011437971",
                "Cache-Control: no-cache",
            )));

        $response = curl_exec($curl);
        curl_close($curl);


        return $response;
    }
}
