<?php

namespace App\Http\Controllers;


use App\Charts\HomeChart;
use App\Coupon;
use App\Message;
use App\Sale;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['verified']);
    }

    public function index()
    {
        $today_users = Sale::whereDate('created_at', today())->count();
        $yesterday_users = Sale::whereDate('created_at', today()->subDays(1))->count();
        $users_2_days_ago = Sale::whereDate('created_at', today()->subDays(2))->count();

        $chart = new HomeChart;
        $chart->labels(['2 days ago', 'Yesterday', 'Today']);
        $chart->dataset('My dataset', 'line', [$users_2_days_ago, $yesterday_users, $today_users]);

        return view('backend/dashbord', ['chart' => $chart]);


    }
    function MessageView(){
        $messageview = Message::paginate(5);
        return view('backend.messageview', compact('messageview'));
    }
    function MessageDelete($id){
        Message::findOrfail($id)->delete();
        return redirect('/Message/View')->with('delete', 'Message Delete Successfully .');
    }
    function coupon(){
        return view('backend.coupon.index');
    }
    function couponadd(Request $request){
        $request->validate([
            'coupon_code' => 'required',
            'coupon_discount' => 'required | numeric',
            'coupon_validity' => 'required | date',

        ]);
        Coupon::insert([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        return view('backend.coupon.index')->with('cuoponinsert', 'Coupon Insert Successfully .');
    }
    function couponview(){
        $coupon = Coupon::paginate(3);
        return view('backend.coupon.indexview', compact('coupon'));
    }
    function coupondelete($id){
        Coupon::findOrFail($id)->delete();
        return redirect('/coupon/view')->with('delete', 'Coupon Delete Successfully');
    }
    function couponedit($id){
        $couponedit = Coupon::findOrFail($id);
        session(['com_id' => $id]);
        return view('backend.coupon.couponedit', compact('couponedit'));
    }
    function couponupdate(Request $request){
        $id = $request->session()->get('com_id');
        $request->validate([
            'coupon_code' => 'required',
            'coupon_discount' => 'required | numeric',
            'coupon_validity' => 'required | date',
        ]);
        Coupon::findOrFail($id)->update([
            'coupon_code' => $request->coupon_code,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
        ]);
        return redirect('/coupon/view')->with('update', 'Coupon Update Successfully');
    }
}
