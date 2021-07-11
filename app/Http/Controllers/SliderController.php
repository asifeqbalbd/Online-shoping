<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function slider(){
        return view('backend.slider.slider');
    }

    function slideradd(Request $request){
        $request->validate([
            'slider_title' => ['required', 'max:100'],
            'slider_summary' =>['required', 'max:3000'],
            'slider_image' =>['mimes:png,jpg,jpeg,gif', 'required', 'max:40000'],
            [
                'logo.max' =>"Maximum 40000kb file Uplode",
            ]
        ]);
        if ($request->hasFile('slider_image')) {
            $image = $request->file('slider_image');
            $ext = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920, 1000)->save(public_path('/img/slider/'. $ext));


            Slider::insert([
                'slider_title' => $request->slider_title,
                'slider_summary' => $request->slider_summary,
                'slider_image' => $ext,
                'created_at' => Carbon::now(),
            ]);
             return back()->with('session','Category Name Added Successfully');
        }
    }
    function sliderview(){
        $products = Slider::paginate(3);
        return view('backend/slider/sliderView', compact('products'));
    }
    function sliderdelete($id){
        Slider::findOrFail($id)->delete();
        return redirect('/sliderview')->with('delete', 'Profile Delete Successfully');
    }

}
