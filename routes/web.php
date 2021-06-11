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
    Route::get('/', [NavController::class, 'main'])
        ->name('main');

    Route::get('/catalog', [NavController::class, 'catalog'])
        ->name('catalog');

    Route::get('/contacts', 'NavController@contact')
        ->name('contacts');

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
], function (){
    Route::get('/profile', [UserController::class, 'index'])
        ->middleware('auth')
        ->name('profile');

    Route::get('/download', [UserController::class, 'downloadExcel'])
        ->middleware('auth')
        ->name('download');

    Route::get('/like', [UserController::class, 'createLike'])
        ->middleware('auth')
        ->name('like');

    Route::get('/search', [UserController::class, 'search'])
        ->name('search');
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
    Route::match(['GET', 'POST'], '/createGood', [AdminController::class, 'createGood'])
        ->name('create');

    Route::get('/update/{id}', [AdminController::class, 'updateGood'])
        ->name('update');

    Route::match(['get', 'post'], '/save', [AdminController::class, 'saveGood'])
        ->name('save')
        ->middleware(\App\Http\Middleware\SaveGood::class);

    Route::get('/delete/{id}', 'AdminController@deleteGood')
        ->name('delete');

    Route::get('/deleteall', 'AdminController@deleteAll')
        ->name('deleteAll');
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

    Route::get('/goods', [AdminController::class, 'showGoods'])
        ->name('goods');

    Route::match(['POST', 'GET'], '/upload', [AdminController::class, 'uploadGoodsFromExcel'])
    ->name('upload')
    ->middleware(\App\Http\Middleware\FileUpload::class);
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


require __DIR__.'/auth.php';
