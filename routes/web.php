<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

/*
Route::get('{any}', function () {
    return view('welcome');
})->where('any','.*');
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin',[App\Http\Controllers\AdminController::class,'index'])->name('admin.index');


Route::namespace('App\Http\Controllers')->prefix('admin')->group(function () {

    Route::resource('users','UserController')
                ->names('users');
});



