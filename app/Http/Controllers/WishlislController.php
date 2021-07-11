<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishlislController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function Wishlist(){
        $user_ip = $_SERVER['REMOTE_ADDR'];
        $wishlists = Wishlist::with('product')->where('user_ip', $user_ip)->get();
        return view('forntent.wishlist', compact('wishlists'));
    }
    function SingleWishlist($product_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];


        if(Wishlist::where('product_id',$product_id)->where('user_ip', $user_ip)->exists()){
            Wishlist::where('product_id',$product_id)->where('user_ip', $user_ip);
        }
        else{
            Wishlist::insert([
                'product_id' => $product_id,
                'user_ip' => $user_ip,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }
    function SingleWishlistDelete($id){
        $user_ip = $_SERVER['REMOTE_ADDR'];
        Wishlist::where('id',$id)->where('user_ip',$user_ip)->delete();
        return back()->with('Wishlist', 'Wishlist item Delete sucessfully');
    }

}
