<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller
{
    function cart($coupon = ''){
        if($coupon == ''){
            $discount = 0;
            session(['discount' => $discount]);
            $user_ip = $_SERVER['REMOTE_ADDR'];
            $carts = Cart::with('product')->where('user_ip', $user_ip)->get();
            return view('forntent.cart', compact('carts', 'discount'));
        }
        else{
            if (Coupon::where('coupon_code', $coupon)->exists()) {
                $validity = Coupon::where('coupon_code', $coupon)->first()->coupon_validity;
                if(Carbon::now()->format('Y-m-d') <= $validity){
                    $user_ip = $_SERVER['REMOTE_ADDR'];
                    $carts = Cart::with('product')->where('user_ip', $user_ip)->get();
                    $discount = Coupon::where('coupon_code',$coupon)->first()->coupon_discount;
                    session(['discount' => $discount]);
                    return view('forntent.cart', compact('carts', 'discount'));
                    return back()->with('coupon', 'Your Coupon this');
                }
                else{
                    return back()->with('Expired', 'This Coupon Time is Expired');
                }
            }
            else{
                return back()->with('coupon',"This Coupon Name Not Possible");
            }
        }
    }

    function SingleCartDelete($cart_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];
        Cart::where('id',$cart_id)->where('user_ip',$user_ip)->delete();
        return back()->with('CartDelete', 'Cart item Delete sucessfully');
    }

    function CartvalueUpdate(Request $request){
        foreach($request->cart_id as $key => $item){
            Cart::findOrFail($item)->update([
                'product_quantity' => $request->product_quantity[$key],
            ]);
        }
        return back();
    }
}

