<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    function subcategory(){
        $cat = Category::orderBy('category_name','asc')->get();
        return view('backend.sub.subcategory', compact('cat'));
    }
    function subcategoryadd(Request $request){

        SubCategory::insert([
            'subcategory_name' => $request -> subcategory_name,
            'category_id' => $request -> category_id,
            'created_at' => Carbon::now(),

        ]);
        return back()->with('session','Sub Category Added Successfully');
    }
    function subcategoryview(){
        $sl = SubCategory::count();
        $subcat = SubCategory::orderBy('subcategory_name', 'asc')->with('get_reg')->paginate(3);
        return view('backend/sub/subcategoryview', compact('subcat', 'sl'));
    }

    function subcategoryEdit($id){
        $cat = Category::all();
        $subcat = SubCategory::findOrFail($id);
        session(['pro_id' => $id]);
        return view('backend.sub.subcategoryEdit', compact('cat', 'subcat'));
    }

    function subcategoryUpdate(Request $request){
        $id = $request->session()->get('pro_id');
        $request->validate([
            'subcategory_name' => [
                'required', 'min:3', 'max:15', 'unique:sub_categories'
            ],
            [
                'subcategory_name.min' => "Minimum 3 Characters Data",
                'subcategory_name.required' => "Pleces Inter Your Sub Category Name",
            ]
        ]);
        SubCategory::findOrFail($id)->update([
            'subcategory_name' => $request -> subcategory_name,
            'category_id' => $request -> category_id,
        ]);
        return redirect('/subcategoryView')->with('update', 'Category Name Update Successfully');
    }

    function subcategorydelete($id){
        SubCategory::findOrFail($id)->delete();
        return back()->with('delete','Sub Category Name Delete Successfully');

    }
    function subcategoryDeleted(){
        $sdl = SubCategory::onlyTrashed()->count();
        $subregd = SubCategory::orderBy('subcategory_name', 'asc')->onlyTrashed()->paginate(3);
        return view('backend/sub/deletedView', compact('subregd', 'sdl'));
        return back();
    }
    function subcategoryRestors($id){
        SubCategory::withTrashed()->findOrFail($id)->restore();
        return back()->with('scRestor', 'Sub Category Restore Successfully');
    }
    function subcategorypDeleted($id){
        SubCategory::withTrashed()->findOrFail($id)->forceDelete();
        return back()->with('delete', 'Sub Name Parmanetiy Delete Successfully');
    }
}
