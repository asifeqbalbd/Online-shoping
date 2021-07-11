<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true]);
//Category Route
Route::get('/category', 'CategoryController@category');
Route::post('/category-add', 'CategoryController@categoryadd');
Route::get('/categoryView', 'CategoryController@categoryview');
Route::get('/categorydelete/{id}', 'CategoryController@categorydelete');
Route::get('/categoryedit/{id}', 'CategoryController@categoryEdit');
Route::post('/category-update', 'CategoryController@categoryUpdate');

//Sub Category Route
Route::get('/subcategory', 'SubCategoryController@subcategory');
Route::post('/subcategory-add', 'SubCategoryController@subcategoryadd');
Route::get('/subcategoryView', 'SubCategoryController@subcategoryview');
Route::get('/subcategorydelete/{id}', 'SubCategoryController@subcategorydelete');
Route::get('/subcategoryedit/{id}', 'SubCategoryController@subcategoryEdit');
Route::post('/subcategory-update', 'SubCategoryController@subcategoryUpdate');
Route::get('/subcategorydeletedView', 'SubCategoryController@subcategoryDeleted');
Route::get('/subcategorydeletedRestor/{id}', 'SubcategoryController@subcategoryRestors');
Route::get('/subcategoryparmanetdeleted/{id}', 'SubcategoryController@subcategorypDeleted');

//Product Route
Route::get('/product', 'ProductController@product');
Route::post('/product-add', 'ProductController@productadd');
Route::get('/productView', 'ProductController@productview');
Route::get('/productdelete/{id}', 'ProductController@productdelete');
Route::get('/productdeletedView', 'ProductController@productDeleted');
Route::get('/productedit/{id}', 'ProductController@productEdit');
Route::post('/product-update', 'ProductController@productUpdate');
Route::get('/productRestor/{id}', 'ProductController@productRestor');
Route::get('/product/parmanet/deleted/{id}', 'ProductController@productpDeleted');
Route::get('/api/get-state-list/{category_id}', 'ProductController@GetStatelist')->name('GetStatelist');

//Best Selar Route
Route::get('/BestSelar', 'BestSelarController@BestSelar')->name('BestSelar');
Route::post('/BestSelar-add', 'BestSelarController@BestSelaradd')->name('BestSelaradd');
Route::get('/BestSelarView', 'BestSelarController@BestSelarview')->name('BestSelarview');
Route::get('/item/bast/seler/{id}', 'ForntentController@BastSingleProduct')->name('BastSingleProduct');

// slider Route
Route::get('/slider', 'SliderController@slider');
Route::post('/slider-add', 'SliderController@slideradd');
Route::get('/sliderview', 'SliderController@sliderview');
Route::get('/slider/delete/{id}', 'SliderController@sliderdelete');

//Profile Route
Route::get('/profile/fontent', 'ProfileController@Profile')->name('Profile');
Route::post('/profile/post/database', 'ProfileController@ProfilePost')->name('ProfilePost');
Route::get('/profile/view', 'ProfileController@ProfileView')->name('ProfileView');
Route::get('/profile/post/edit/{id}', 'ProfileController@ProfileEdit');
Route::get('/profile/post/delete/{id}', 'ProfileController@ProfileDelete')->name('ProfileDelete');
Route::post('/profile/post/database/update', 'ProfileController@ProfilePostUpdate')->name('ProfilePostUpdate');

//Social Media Route
Route::get('/Social/fontent', 'SocialController@Social')->name('Social');
Route::post('/Social/post/database', 'SocialController@SocialPost')->name('SocialPost');
Route::get('/Social/view', 'SocialController@SocialView')->name('SocialView');
Route::get('/socialpostedit/{id}', 'SocialController@SocialPostEdit')->name('SocialPostEdit');
Route::get('/Social/post/delete/{id}', 'SocialController@SocialPostDelete')->name('SocialPostDelete');
Route::post('/Social/post/database/update', 'SocialController@SocialPostUpdate')->name('SocialPostUpdate');

//ForntentController Route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Message/View', 'HomeController@MessageView')->name('MessageView');
Route::get('/Message/delete/{id}', 'HomeController@MessageDelete')->name('MessageDelete');
Route::get('/item/{id}', 'ForntentController@SingleProduct')->name('SingleProduct');

//Coupon Route
Route::get('/coupon', 'HomeController@coupon')->name('coupon');
Route::post('/coupon/add', 'HomeController@couponadd')->name('couponadd');
Route::get('/coupon/view', 'HomeController@couponview')->name('couponview');
Route::get('/coupon/delete/{id}', 'HomeController@coupondelete')->name('coupondelete');
Route::get('/coupon/edit/{id}', 'HomeController@couponedit')->name('couponedit');
Route::post('/coupon/update', 'HomeController@couponupdate')->name('couponupdate');

//Checkout route
Route::get('/Checkout', 'CheckoutController@Checkout')->name('Checkout');
Route::get('/api/get-state-list/{country_id}', 'CheckoutController@GetStatelist')->name('GetStatelist');
Route::get('/api/get-city-list/{state_id}', 'CheckoutController@GetCitylist')->name('GetCitylist');

//Payment route
Route::post('/payment', 'PaymentController@Payment')->name('Payment');
Route::post('/product/review', 'ForntentController@review')->name('review');

//Login And Reg Github Route
Route::get('login/github', 'SocialController@redirectToProvider')->name('redirectToProvider');
Route::get('login/github/callback', 'SocialController@handleProviderCallback')->name('handleProviderCallback');
//Login And Reg Google Route
Route::get('login/google', 'SocialController@redirectToProvidergoogle')->name('redirectToProviderGoogle');
Route::get('login/google/callback', 'SocialController@handleProviderCallbackgoogle')->name('handleProviderCallbackGoogle');

Route::get('/', 'ForntentController@ForntPage')->name('ForntPage');
Route::get('/cart', 'CartController@cart')->name('cart');
Route::get('/shop', 'ForntentController@shop')->name('shop');
Route::get('/single-cart/{slug}', 'ForntentController@SingleCart')->name('SingleCart');
Route::get('/single-carts/{slug}', 'ForntentController@SingleCarts')->name('SingleCarts');
Route::post('/search/product', 'ForntentController@Search')->name('Search');
Route::get('/cart/{coupon}', 'CartController@cart')->name('Couponcart');
Route::get('/single/cart-delete/{id}', 'CartController@SingleCartDelete')->name('SingleCartDelete');
Route::post('/cart/value/update', 'CartController@CartvalueUpdate')->name('CartvalueUpdate');
Route::get('/contact', 'ForntentController@Contact')->name('Contact');
Route::post('/contact/message', 'ForntentController@ContactMessage')->name('ContactMessage');

Route::get('/wishlist', 'WishlislController@Wishlist')->name('Wishlist');
Route::get('/single/Wishlist/{slug}', 'WishlislController@SingleWishlist')->name('SingleWishlist');
Route::get('/single/Wishlist/delete/{id}', 'WishlislController@SingleWishlistDelete')->name('SingleWishlistDelete');
Route::get('/wishlist/single/carts/{slug}', 'WishlislController@SingleWishlistCart')->name('SingleWishlistCart');
