<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function category(){
        return view('backend/category');
    }

    function categoryadd(Request $request){
        $request->validate([
            'category_name' => [
                'required', 'min:3', 'max:15', 'unique:categories'
            ],
            [
                'category_name.min' => "Minimum 3 Characters Data",
                'category_name.required' => "Pleces Inter Your Category Name",
            ]
        ]);

        if ($request->hasFile('category_thumbnail')) {
            $image = $request->file('category_thumbnail');
            $ext = time().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600, 470)->save(public_path('/img/category/'. $ext));
            Category::insert([
                'category_name' => $request->category_name,
                'category_thumbnail' => $ext,
                'created_at' => Carbon::now(),
            ]);
            return back()->with('session', 'Category Name Added Successfully');
        }
    }

    function categoryview(){
        $category = Category::orderBy('category_name', 'asc')->paginate(3);
        return view('backend.categoeyView', compact('category'));
    }

    function categorydelete($id){
        Category::findOrFail($id)->delete();
        return back()->with('delete',' Category Name Delete Successfully');;
    }

    function categoryEdit($id){
        $category = Category::findOrFail($id);
        return view('backend/categoryEdit', compact('category'));
    }

    function categoryUpdate(Request $request){
        $request->validate([
            'category_name' => [
                'required', 'min:3', 'max:15', 'unique:categories'
            ],
            [
                'category_name.min' => "Minimum 3 Characters Data",
                'category_name.required' => "Pleces Inter Your Category Name",
            ]
        ]);
        $id = $request -> id;
        Category::findOrFail($id)->update([
            'category_name' => $request -> category_name,
        ]);
        return redirect('/categoryView')->with('update', 'Category Name Update Successfully');
    }
}
