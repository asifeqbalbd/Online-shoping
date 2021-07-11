<?php

namespace App\Http\Controllers;

use App\BestSeler;
use App\BestSeler_image;
use App\Category;
use App\SubCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class BestSelarController extends Controller
{
    function BestSelar(){
        $cat = Category::orderBy('category_name','asc')->get();
        $subcat = SubCategory::orderBy('subcategory_name','asc')->get();
        return view('backend.bastseler.index', compact('cat', 'subcat'));
    }
    function BestSelaradd(Request $request){
        $slug = strtolower(str_replace(' ', '-', $request->product_name));
        $a_slug = BestSeler::where('slug', $slug)->count();
        if($a_slug > 0){
            $slug = $slug . '-' . time();
        }
        if($request->hasFile('product_thumbnail')){
            $image = $request->file('product_thumbnail');
            $ext = $slug.'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600, 622)->save(public_path('/img/bastseler/'. $ext));

            $product_id = BestSeler::insertGetId([
                'category_id' => $request -> category_id,
                'subcategory_id' => $request -> subcategory_id,
                'product_name' => $request->product_name,
                'slug' => $slug,
                'product_summary' => $request -> product_summary,
                'product_description' => $request -> product_description,
                'product_price' => $request -> product_price,
                'product_thumbnail' => $ext,
                'created_at' => Carbon::now(),
            ]);

            if($request->hasFile('image_gallery')){
                $img = $request->file('image_gallery');
                foreach($img as $key => $item1){
                    $ext1 = time().$key.'.'.$item1->getClientOriginalExtension();
                    Image::make($item1)->resize(600, 622)->save(public_path('/img/galleyr1/'. $ext1));

                    BestSeler_image::insert([
                        'product_id' => $product_id,
                        'image_gallery' => $ext1,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }
        }
        else{
            $product_id = BestSeler::insertGetId([
                'category_id' => $request -> category_id,
                'subcategory_id' => $request -> subcategory_id,
                'product_name' => $request->product_name,
                'slug' => $slug,
                'product_summary' => $request -> product_summary,
                'product_description' => $request -> product_description,
                'product_price' => $request -> product_price,
                'created_at' => Carbon::now(),
            ]);
            if($request->hasFile('image_gallery')){
                $img1 = $request->file('image_gallery');
                foreach($img1 as $key => $item2){
                    $ext2 = time().$key.'.'.$item2->getClientOriginalExtension();
                    Image::make($item2)->resize(600, 622)->save(public_path('/img/galleyr1/'. $ext2));

                    BestSeler_image::insert([
                        'product_id' => $product_id,
                        'image_gallery' => $ext2,
                        'created_at' => Carbon::now(),
                    ]);
                }
            }
        }

        return back()->with('session','BestSeler Added Successfully');
    }
    function BestSelarview(){
        $best = BestSeler::paginate(10);
        return view('backend.bastseler.indexview', compact('best'));
    }
}
