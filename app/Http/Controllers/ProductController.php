<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller {
	public function __construct() {
		$this->middleware(['auth']);
	}
	function product() {
		$cat = Category::orderBy('category_name', 'asc')->get();
		$subcat = SubCategory::orderBy('subcategory_name', 'asc')->get();
		return view('backend.product.product', compact('cat', 'subcat'));
	}

	function productadd(Request $request) {
		$request->validate([
			'product_name' => 'required',
			'product_summary' => 'required | max:1000',
			'product_description' => 'required | max:10000',
			'product_price' => 'required | max:6 | numeric',
			'product_quantity' => 'required | max:6 | numeric',
			'product_thumbnail' => 'required | mimes:png,jpg,jpeg,gif | max:40000',
		]);
		$slug = strtolower(str_replace(' ', '-', $request->product_name));
		$a_slug = Product::where('slug', $slug)->count();
		if ($a_slug > 0) {
			$slug = $slug . '-' . time();
		}
		if ($request->hasFile('product_thumbnail')) {
			$image = $request->file('product_thumbnail');
			$ext = $slug . '.' . $image->getClientOriginalExtension();
			Image::make($image)->resize(600, 622)->save(public_path('/img/thumbnail/' . $ext));

			$product_id = Product::insertGetId([
				'category_id' => $request->category_id,
				'subcategory_id' => $request->subcategory_id,
				'product_name' => $request->product_name,
				'slug' => $slug,
				'product_summary' => $request->product_summary,
				'product_description' => $request->product_description,
				'product_price' => $request->product_price,
				'product_thumbnail' => $ext,
				'created_at' => Carbon::now(),
			]);

			if ($request->hasFile('image_gallery')) {
				$img = $request->file('image_gallery');
				foreach ($img as $key => $item1) {
					$ext1 = time() . $key . '.' . $item1->getClientOriginalExtension();
					Image::make($item1)->resize(600, 622)->save(public_path('/img/galleyr/' . $ext1));

					Product_image::insert([
						'product_id' => $product_id,
						'image_gallery' => $ext1,
						'created_at' => Carbon::now(),
					]);
				}
			}
		} else {
			$product_id = Product::insertGetId([
				'category_id' => $request->category_id,
				'subcategory_id' => $request->subcategory_id,
				'product_name' => $request->product_name,
				'slug' => $slug,
				'product_summary' => $request->product_summary,
				'product_description' => $request->product_description,
				'product_price' => $request->product_price,
				'created_at' => Carbon::now(),
			]);
			if ($request->hasFile('image_gallery')) {
				$img1 = $request->file('image_gallery');
				foreach ($img1 as $key => $item2) {
					$ext2 = time() . $key . '.' . $item2->getClientOriginalExtension();
					Image::make($item2)->resize(600, 622)->save(public_path('/img/galleyr/' . $ext2));

					Product_image::insert([
						'product_id' => $product_id,
						'image_gallery' => $ext2,
						'created_at' => Carbon::now(),
					]);
				}
			}
		}
		return back()->with('session', 'Product Added Successfully');
	}

	function GetStatelist($category_id) {
		$SubCategory = SubCategory::where('category_id', $category_id)->get();
		return response()->json($SubCategory);
	}

	function productview() {
		$products = Product::paginate(10);
		return view('backend/product/productView', compact('products', ));
	}

	function productEdit($id) {
		$cat = Category::all();
		$subcat = SubCategory::all();
		$products = Product::findOrFail($id);
		session(['pro_id' => $id]);
		return view('backend.product/productEdit', compact('products', 'cat', 'subcat'));
	}

	function productUpdate(Request $request) {
		$request->validate([
			'product_name' => 'required',
			'product_summary' => 'required | max:1000',
			'product_description' => 'required | max:10000',
			'product_price' => 'required | max:6 | numeric',
			'product_quantity' => 'required | max:6 | numeric',
			'product_thumbnail' => 'required | mimes:png,jpg,jpeg,gif | max:40000',
		]);
		$id = $request->session()->get('pro_id');
		$old_product = Product::findOrFail($id);
		$slug = $old_product->slug;
		$old_img = $old_product->product_thumbnail;
		if ($request->hasFile('product_thumbnail')) {
			$image = $request->file('product_thumbnail');
			$ext = $slug . '.' . $image->getClientOriginalExtension();
			if (file_exists(public_path('img/thumbnail/') . $old_img)) {
				unlink(public_path('img/thumbnail/') . $old_img);
			}
			Image::make($image)->resize(600, 622)->save(public_path('/img/thumbnail/' . $ext));

			Product::findOrFail($id)->update([
				'category_id' => $request->category_id,
				'subcategory_id' => $request->subcategory_id,
				'product_name' => $request->product_name,
				'product_summary' => $request->product_summary,
				'product_description' => $request->product_description,
				'product_price' => $request->product_price,
				'product_quantity' => $request->product_quantity,
				'product_thumbnail' => $ext,
			]);
		} else {
			Product::findOrFail($id)->update([
				'category_id' => $request->category_id,
				'subcategory_id' => $request->subcategory_id,
				'product_name' => $request->product_name,
				'product_summary' => $request->product_summary,
				'product_description' => $request->product_description,
				'product_price' => $request->product_price,
				'product_quantity' => $request->product_quantity,
			]);
		}
		return redirect('/productView')->with('update', 'Category Name Update Successfully');

	}
	function productdelete($id) {
		Product::findOrFail($id)->delete();
		return back()->with('delete', 'Product Delete Successfully');
	}
	function productDeleted() {
		$products = Product::onlyTrashed()->paginate(3);
		return view('backend.product.deletedView', compact('products'));
	}
	function productRestor($id) {
		Product::withTrashed()->findOrFail($id)->restore();
		return back()->with('scRestor', 'Product Restore Successfully');
	}
	function productpDeleted($id) {
		Product::withTrashed()->findOrFail($id)->forceDelete();
		return back()->with('delete', 'Product Parmanetiy Delete Successfully');
	}
}
