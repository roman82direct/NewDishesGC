<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\NavController;

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
    return view('main');
});

Route::group([
    'prefix' => '/',
    'as' => 'nav::',
    'namespace' => '\App\Http\Controllers'
], function () {
    Route::get('/main', function () {
        return view('main');
    })->name('main');

    Route::get('/catalog', [NavController::class, 'index'])
        ->name('catalog');

    Route::get('/contacts', 'NavController@contact')
        ->name('contacts');

    Route::get('/news',[NavController::class, 'showNews'])
        ->name('news');

//    Route::get('/test', [\App\Http\Controllers\NavController::class, 'test'])->name('test');

});


//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');
//
require __DIR__.'/auth.php';
