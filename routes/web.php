<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\user\UserController;

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
// Навигация по страницам
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

//    Route::get('category{id}/goods',[NavController::class, 'showGoods'])
//        ->name('goods');

    Route::get('/goods{id}',[NavController::class, 'showGoods'])
        ->name('goods');

    Route::get('/good{id}', [NavController::class, 'showGoodItem'])
        ->name('showGoodItem');
});

// Действия User
Route::group([
    'prefix' => '/user',
    'as' => 'user::',
    'namespace' => '\App\Http\Controllers',
    'middleware' => ['auth']
], function (){
    Route::get('/profile', [\App\Http\Controllers\user\UserController::class, 'index'])
        ->name('profile');

    Route::get('/download', [UserController::class, 'downloadExcel'])
        ->name('download');
});

// Действия Admin
Route::group([
    'prefix' => '/admin/category',
    'as' => 'admin::category::',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth', 'checkrole:admin']

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
    'middleware' => ['auth', 'checkrole:admin']

], function () {
    Route::get('/update/{id}', [AdminController::class, 'updateGood'])
        ->name('update');

    Route::get('/delete/{id}', 'AdminController@deleteGood')
        ->name('delete');
});

Route::group([
    'prefix' => '/admin',
    'as' => 'admin::',
    'namespace' => '\App\Http\Controllers\Admin',
    'middleware' => ['auth', 'checkrole:admin']
], function (){
    Route::get('/panel', [NavController::class, 'showAdminPanel'])
    ->name('panel');

    Route::get('/users', [AdminController::class, 'showUsers'])
        ->name('users');

    Route::get('/upload', [AdminController::class, 'uploadGoodsFromExcel'])
    ->name('upload');
});

/*
 * TESTS
 */
//upload files
Route::get('/cat', function (){
    Storage::disk('uploadCatImg')->put('category.txt', 'url: '.\Illuminate\Support\Facades\Storage::url('img/category/category.txt'));
    return redirect()->route('nav::main');
})->middleware('auth');

Route::get('/goo', function (Request $request){
    Storage::disk('uploadGoodImg')->put('good.txt', 'url: '.\Illuminate\Support\Facades\Storage::url('img/good/good.txt'));
    return redirect()->route('nav::main')->with('success', 'File add!');
})->middleware('auth');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
require __DIR__.'/auth.php';
