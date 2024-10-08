<?php

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


Route::get('/', 'HomeController@index')->name('home');

Route::get('/search', 'HomeController@search')->name('search');


Route::get('/categories', 'CategoryController@index')->name('categories');
Route::get('/categories/{id}', 'CategoryController@detail')->name('categories-detail');

Route::get('/details/{id}', 'DetailController@index')->name('detail');
Route::post('/details/{id}', 'DetailController@add')->name('detail-add');


Route::post('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');

Route::get('/success', 'CartController@success')->name('success');

// Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');
Route::get('/register/success', function(){
    return view('auth.success');
});

Route::get('/cartcoba', 'CartController@coba') ;
Route::post('/cartcoba/post', 'CartController@cobapost')->name('coba-post');

Route::get('/tes', function (){
    return view('pages.tes');
});

Route::get('/store/{id}', 'HomeController@storeProduct')->name('store-product');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', 'CartController@index')
        ->name('cart');
    Route::delete('/cart/{id}', 'CartController@delete')
        ->name('cart-delete');
    Route::post('/checkout', 'CheckoutController@process')
        ->name('checkout');
});


Route::group(['middleware' => ['auth', 'store']], function(){
    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('/dashboard/products', 'DashboardProductController@index')
        ->name('dashboard-product');
    Route::get('/dashboard/products/create', 'DashboardProductController@create')
        ->name('dashboard-product-create');
    Route::post('/dashboard/products', 'DashboardProductController@store')
        ->name('dashboard-product-store');
    Route::get('/dashboard/products/{id}', 'DashboardProductController@details')
        ->name('dashboard-product-detail');
    Route::post('/dashboard/products/{id}', 'DashboardProductController@update')
        ->name('dashboard-product-update');

    Route::post('/dashboard/products/gallery/upload', 'DashboardProductController@uploadGallery')
        ->name('dashboard-product-gallery-upload');
    Route::get('/dashboard/products/gallery/delete/{id}', 'DashboardProductController@deleteGallery')
        ->name('dashboard-product-gallery-delete');

    Route::get('/dashboard/transaction', 'DashboardTransactionController@index')
        ->name('dashboard-transaction');
    Route::get('/dashboard/transaction/{id}', 'DashboardTransactionController@details')
        ->name('dashboard-transaction-detail');
    Route::post('/dashboard/transaction/{id}', 'DashboardTransactionController@update')
        ->name('dashboard-transaction-update');

    Route::get('/dashboard/setting', 'DashboardSettingController@store')
        ->name('dashboard-setting-store');
    Route::get('/dashboard/account', 'DashboardSettingController@account')
        ->name('dashboard-setting-account');
    Route::post('/dashboard/account/{redirect}', 'DashboardSettingController@update')
        ->name('dashboard-setting-redirect');
});


Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth', 'admin', 'verified'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard-admin');
        Route::resource('category', 'CategoryController');
        Route::resource('user', 'UserController');
        Route::resource('product', 'ProductController');
        Route::resource('product-gallery', 'ProductGalleryController');
        Route::resource('transaction', 'TransactionController');
    });

    


Route::group(['middleware' => ['auth', 'store', 'verified']], function () {
    Route::get('/dashboard-tes', function () {
        return view('pages.admin.user.index');
    });
});

Route::prefix('user')
    ->namespace('User')
    ->middleware(['auth', 'user', 'verified'])
    ->group(function(){
        Route::get('/', 'DashboardController@index')->name('dashboard-user');
        Route::post('/', 'DashboardController@openStore')->name('dashboard-user-openStore');
        Route::resource('transaction-user', 'TransactionController');
        Route::resource('payment', 'PaymentController');
        Route::get('account', 'AccountController@index')->name('user-account');
        Route::post('/dashboard/account/{redirect}', 'AccountController@update')
        ->name('user-setting-redirect');
    });

Route::get('/loghome', function(){
    return redirect('/');
})->name('log-home')->middleware('verified');


Auth::routes(['verify' => true]);
// Auth::routes();


