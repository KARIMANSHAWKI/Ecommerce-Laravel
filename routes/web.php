<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('site', 'App\Http\Controllers\UserController@index')->middleware('auth:web');

// ***** && Every Route With Get Method It Have Arabic And English Translation && *****//
Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    
                    // ******** && Admin Routes && ********* //
    Route::get('admin', 'App\Http\Controllers\CategoryController@index')->middleware('auth:admin');
    Route::get('admin/login', 'App\Http\Controllers\AdminController@login');
    Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@getCategoryById');
    Route::get('/manageCategory', 'App\Http\Controllers\CategoryController@index')->name('category.manage');

    Route::get('/manageUser', 'App\Http\Controllers\UserController@index')->name('user.manage');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@getUserById');


});

// ************* Routes With Post Method ******************* //

// Category Opertions
Route::post('admin/login', 'App\Http\Controllers\AdminController@checkAdminLogin')->name('save.admin.login');

Route::post('/add-category', 'App\Http\Controllers\CategoryController@addCategory')->name('add.category');
Route::put('/updateCategory', 'App\Http\Controllers\CategoryController@updateCategory')->name('category.update');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');


// User OPerations
Route::post('/adduser', 'App\Http\Controllers\UserController@addUser')->name('add.user');
Route::put('/update-user', 'App\Http\Controllers\UserController@updateUser')->name('user.update');
Route::delete('/user/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.delete');






