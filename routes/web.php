<?php
namespace App\Http\Controllers\Auth;
use App\Blog;
use App\Http\Controllers\DeleteUserController;
use App\Http\Controllers\HomeController;

use App\Mask;
use App\Providers\RouteServiceProvider;
use Darryldecode\Cart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\Types\Boolean;

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
//,['user'=> Auth::user(),'check'=> Auth::check()]
Route::get('/gallery', function () {
    return view('gallery',['masks' => Mask::all(),'cartCount']);
})->name('gallery');

Route::get('/order-mask', function () {
    return view('order-mask');
})->name('order-mask');

Route::get('/questions', function () {
    return view('questions');
})->name('questions');

Route::get('/selfi', function () {
    return view('selfi',['masks' => Mask::all(),'cartCount']);
})->name('selfi');


Route::get('/objects', function () {
    return view('objects',['masks' => Mask::all(),'cartCount']);
})->name('objects');

Route::get('/profile', function () {
        return view('profile');
})->name('profile');

Route::get('/cart', function () {
    return view('cart');
})->name('cart');

Route::get('/cart-download', 'maskOrderController@order')->name('cart-download')->middleware('auth');

Route::get('/cart-payment', function () {
    return view('payment');
})->name('cart-payment');

Auth::routes();

Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logoutUser');


Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/blogs', function () {
    return view('blogs', ['blogs' => Blog::all()]);
})->name('blogs');

Route::post('/profile/add', 'AddNewMask@add')->name('addMask');
Route::post('/addpost', 'AddBlog@add')->name('addpost');

Route::get('/add-to-cart/{id}', [
    'uses' => 'CartController@addToCart'
])->name('addToCart');

Route::get('/remove-from-cart/{id}', [
    'uses' => 'CartController@removeFromCart'
])->name('removeFromCart');

Route::post('/make-constructor{id}', 'AddConstructorController@add')->name('makeOrder')->middleware('auth');

Route::post('/change-status{id}', 'AddConstructorController@status')->name('changeStatus');

Route::get('/delete-user{id}', 'DeleteUserController@delete')->name('removeUser');

Route::get('/delete-mask{id}', 'DeleteMaskController@delete')->name('removeMask');
