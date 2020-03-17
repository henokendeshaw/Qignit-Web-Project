<?php

use App\Album;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

// Route::get('/cart.html/{id}', [
//     'uses' =>
// ]
//     return view('pages.cart');
// });

Route::get('/','CartController@getId')->name('welcome');

Route::get('/categories.html', function () {
    return view('pages.catagory');
});
Route::get('/category.html', function () {
    return view('pages.catagory');
});

Route::get('/product.html', function () {
    return view('pages.products');
});



Route::get ( '/advSearch','SearchController@advSearch')->name('advSearch');
Route::any ( '/search','SearchController@search')->name('search');
Route::any ( '/search','SearchController@sort')->name('sort');
Route::get ( '/cart.html/{id}','CartController@addToCart')->name('addToCart');
Route::get ( '/cart.html','CartController@getCart')->name('getCart');
Route::get ( '/remove/{id}','CartController@remove')->name('remove');
Route::get ( '/clear','CartController@clear')->name('clear');

Route::get('/signup', 'UserController@getSignup')->name('signup');
Route::post ('/signup', 'UserController@postSignup')->name('signup');
Route::get('/signin', 'UserController@getSignin')->name('signin');
Route::post('/signin', 'UserController@postSignin')->name('signin');
Route::get('/user/profile', 'UserController@getProfile')->name('profile');