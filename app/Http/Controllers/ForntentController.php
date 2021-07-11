<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\BestSeler;
use App\Billing;
use App\Message;
use App\Review;
use Illuminate\Http\Request;
use App\Product;
use App\Profile;
use App\User;
use Carbon\Carbon;

class ForntentController extends Controller
{


    function ForntPage(){
        $list = Product::all();
        $profile = Profile::all();
        $besl = BestSeler::limit(4)->inRandomOrder()->get();
        return view('forntent.dashbord', compact('list', 'profile', 'besl'));
    }

    function SingleProduct($slug){
        $product = Product::where('slug', $slug)->first();
        $related_product = Product::where('category_id', $product->category_id)->limit(4)->inRandomOrder()->get();
        return view('forntent.single_product', compact('product', 'related_product'));
    }
    function BastSingleProduct($slug){
        $bastseler = BestSeler::where('slug', $slug)->first();
        return view('forntent.best_single_product', compact('bastseler'));
    }

    function shop(){
        $cat_shop = Category::orderBy('category_name', 'asc')->get();
        $product_shop = Product::orderBy('product_name', 'asc')->get();
        return view('forntent.shop', compact('cat_shop', 'product_shop'));
    }

    function SingleCart($product_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];
        if(Cart::where('product_id',$product_id)->where('user_ip', $user_ip)->exists()){
            Cart::where('product_id',$product_id)->where('user_ip', $user_ip)->increment('product_quantity');
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'user_ip' => $user_ip,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }
    function SingleCarts($product_id){
        $user_ip = $_SERVER['REMOTE_ADDR'];

        if(Cart::where('product_id',$product_id)->where('user_ip', $user_ip)->exists()){
            Cart::where('product_id',$product_id)->where('user_ip', $user_ip)->increment('product_quantity');
        }
        else{
            Cart::insert([
                'product_id' => $product_id,
                'user_ip' => $user_ip,
                'created_at' => Carbon::now(),
            ]);
        }
        return redirect('/cart');
    }

    function review(Request $data){
        $data->validate([
            'stars' => 'required',
            'name' => 'required',
            'email' => 'required | email',
            'review' => 'required',
        ]);
        $user_id = User::where('email', $data->email)->first()->id;
        if(Billing::where('user_id', $user_id)->where('product_id', $data->product_id)->exists()){
            Review::insert([
                'product_id' => $data->product_id,
                'stars' => $data->stars,
                'name' => $data->name,
                'email' => $data->email,
                'review' => $data->review,
                'created_at' =>date('Y-m-d H:i:s'),
            ]);
        }
        return back();
    }
    function Contact(){
        return view('forntent.contact');
    }
    function ContactMessage(Request $request){
        $request->validate([
            'name' => 'required | max:100',
            'email' => 'required | email',
            'subject' => 'required',
            'msg' => 'required | max:10000',
        ]);
        Message::insert([
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->msg,
            'subject' => $request->subject,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }
    function Search(Request $request){
        $search = $request->input("search");
        $data = Product::where('product_name', 'LIKE', "%{$search}%")->get();
        $cat_shop = Category::orderBy('category_name', 'asc')->get();
        return view('forntent.search', compact('cat_shop','data'));

    }
}
