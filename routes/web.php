<?php

use App\Product;
use App\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('user_register','CustomerController@showRegister');
Route::post('userregister','CustomerController@registerUser');

Route::get('user_login','CustomerController@showlogin');
Route::post('userlogin','CustomerController@loginUser');

Route::get('dashboard','UserDashboardController@index');

Route::get('userlogout', function () {
   Session::forget('user');
    return view('welcome');
});


Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')->group(function () {
//Categories
Route::get('categories','CategoryController@show')->name('categories');
Route::get('add_categories','CategoryController@addcategory')->name('add_categories');
Route::post('addcategory','CategoryController@store');
Route::get('deletecategory/{id}','CategoryController@destroy');
Route::get('edit_categories/{id}','CategoryController@edit');
Route::post('editcategories/{id}','CategoryController@update');

//products
Route::get('products','ProductController@show')->name('products');
Route::get('add-products','ProductController@addProduct')->name('add-products');
Route::post('addproduct','ProductController@store');
Route::get('delete/{id}','ProductController@destroy');
Route::get('edit/{id}','ProductController@edit');
Route::post('editproduct/{id}','ProductController@update');

//Images
Route::get('add-images/{id}','ProductController@addImages');
Route::post('add_image_product/{id}','ProductController@addMultiImages');

//category Images
Route::get('add-category-images/{id}','CategoryController@multipleImages');
Route::post('add_image_category/{id}','CategoryController@categoryMultipleImages');
});



Route::get('/mproducts/{id}', function ($id) {
    $product = Product::find($id);
    dd($product->images);
});

Route::get('/mcategories/{id}', function ($id) {
    $product = Category::find($id);
    dd($product->images);
});








//Route::match(['get','post'],'admin/add-edit-products/{id?}','ProductController@addEditProduct');
