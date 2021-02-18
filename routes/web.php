<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NavController;
use \App\Http\Controllers\Admin\AdminController;

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
    return view('menu.main');
});

Route::group([
    'prefix' => '/',
    'as' => 'nav::',
    'namespace' => '\App\Http\Controllers'
], function () {
    Route::get('/', function () {
        return view('menu.main');
    })->name('main');

    Route::get('/catalog', [NavController::class, 'index'])
        ->name('catalog');

    Route::get('/contacts', 'NavController@contact')
        ->name('contacts');

    Route::get('category{id}/goods',[NavController::class, 'showGoods'])
        ->name('goods');

    Route::get('/good{id}', [NavController::class, 'showGoodItem'])
        ->name('showGoodItem');
});

Route::group([
    'prefix' => '/',
    'as' => 'user::',
    'namespace' => '\App\Http\Controllers'
], function (){
    Route::get('/profile', [\App\Http\Controllers\user\UserController::class, 'index'])
        ->name('profile');
});

Route::group([
    'prefix' => '/admin/category',
    'as' => 'admin::category::',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth']

], function () {
    Route::get('/update/{id}', [AdminController::class, 'updateCategory'])
        ->name('update');

    Route::get('/delete/{id}', 'AdminController@deleteCategory')
        ->name('delete');
});
Route::group([
    'prefix' => '/admin/good',
    'as' => 'admin::good::',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth']

], function () {
    Route::get('/update/{id}', [AdminController::class, 'updateGood'])
        ->name('update');

    Route::get('/delete/{id}', 'AdminController@deleteGood')
        ->name('delete');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
require __DIR__.'/auth.php';
