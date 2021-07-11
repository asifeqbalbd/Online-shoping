<?php

namespace App\Http\Controllers;

use App\Cart;
use App\City;
use App\Country;
use App\Coupon;
use App\States;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function Checkout(Request $request){
        $user_ip = $_SERVER['REMOTE_ADDR'];
            $carts = Cart::with('product')->where('user_ip', $user_ip)->get();
            $auth_user = Auth::user();
            $countres = Country::orderBy('name', 'asc')->get();
            $sub_total = 0;
            foreach($carts as $cart){
                $sub_total += $cart->product->product_price * $cart->product_quantity;
            }
            $discount = $request->session()->get('discount');
            $total = $sub_total - ($sub_total * ($discount/100));
            session(['total' => $total]);
        return view('forntent.checkout', compact('auth_user', 'countres', 'sub_total', 'discount', 'total'));
    }
    function GetStatelist($country_id){
        $states = States::where('country_id', $country_id)->get();
        return response()->json($states);
    }
    function GetCitylist($state_id){
        $citys = City::where('state_id', $state_id)->get();
        return response()->json($citys);
    }
}
