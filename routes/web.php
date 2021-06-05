<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('site', 'App\Http\Controllers\UserController@index')->middleware('auth:web');


Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::get('admin', 'App\Http\Controllers\CategoryController@index')->middleware('auth:admin');
});

Route::get('admin/login', 'App\Http\Controllers\AdminController@login');
Route::post('admin/login', 'App\Http\Controllers\AdminController@checkAdminLogin')->name('save.admin.login');

Route::post('/add-category', 'App\Http\Controllers\CategoryController@addCategory')->name('add.category');
Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@getCategoryById');
Route::post('/updateCategory', 'App\Http\Controllers\CategoryController@updateCategory')->name('category.update');
Route::get('/admins', 'App\Http\Controllers\AdminController@showAdmin');


Route::get('/manageCategory', 'App\Http\Controllers\CategoryController@index')->name('category.show');
