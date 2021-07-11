<?php

namespace App\Http\Controllers;

use App\Billing;
use App\Cart;
use App\Mail\OrderShipped;
use App\Product;
use App\Sale;
use App\Shipping;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    function Payment(Request $request){
        $total = $request->session()->get('total');
        $discount = $request->session()->get('discount');
        $shipping_id = Shipping::insertGetId([
            'user_id' => Auth::user()->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'compani_name' => $request->compani_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'post_zip' => $request->post_zip,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'massage' => $request->massage,
            'created_at' => Carbon::now(),
        ]);

        $sale_id = Sale::insertGetId([
            'user_id' => Auth::user()->id,
            'shipping_id' => $shipping_id,
            'grand_total' => $total,
            'discount' => $discount,
            'created_at' => Carbon::now(),
        ]);
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $carts = Cart::with('product')->where('user_ip', $user_ip)->get();
        foreach($carts as $item){
            Billing::insert([
                'user_id' => Auth::user()->id,
                'sale_id' => $sale_id,
                'shipping_id' => $shipping_id,
                'product_id' =>$item->product_id,
                'product_price' =>$item->product->product_price,
                'product_quantity' =>$item->product_quantity,
                'created_at' => Carbon::now(),
            ]);
            Product::findOrFail($item->product_id)->decrement('product_quantity', $item->product_quantity);
            $item->delete();
        }

        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey('sk_test_ZOWvQcjPaXMuzS388QMzgcXV00mNfkut0p');
        \Stripe\Charge::create([
            'amount' => $total * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
        ]);
        $orderdata = Billing::where('shipping_id', $shipping_id)->get();
        Mail::to("asif.paglapirbd222@gmail.com")->send(new OrderShipped($orderdata));

        return redirect('/');


    }
}
