<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\News;
use App\Models\Admin;
use App\Http\Livewire\NewsLiveWire;
use App\Http\Controllers\ProductController;


// ............... User ............
use App\Http\Controllers\User\SiteController;

use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// ***** && Every Route With Get Method It Have Arabic And English Translation && *****//
Route::group(['prefix'=>LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    
                    // ******** && Admin Routes && ********* //
    Route::get('admin', 'App\Http\Controllers\CategoryController@index')->middleware('auth:admin');
    Route::get('admin/login', 'App\Http\Controllers\AdminController@login');
    Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@getCategoryById');
    Route::get('/manageCategory', 'App\Http\Controllers\CategoryController@index')->name('category.manage');

    Route::get('/manageUser', 'App\Http\Controllers\UserController@index')->name('user.manage');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@getUserById');

    Route::get('/manageProduct', [ProductController::class, 'index'])->name('product.index');

});

// ************* Routes With Post Method ******************* //

Route::post('admin/login', 'App\Http\Controllers\AdminController@checkAdminLogin')->name('save.admin.login');

// Category Opertions
Route::post('/add-category', 'App\Http\Controllers\CategoryController@addCategory')->name('add.category');
Route::put('/updateCategory', 'App\Http\Controllers\CategoryController@updateCategory')->name('category.update');
Route::delete('/category/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.delete');


// User OPerations
Route::post('/adduser', 'App\Http\Controllers\UserController@addUser')->name('add.user');
Route::put('/update-user', 'App\Http\Controllers\UserController@updateUser')->name('user.update');
Route::delete('/user/{id}', 'App\Http\Controllers\UserController@destroy')->name('user.delete');

// Product Operation
Route::post('/addProduct', [ProductController::class, 'store'])->name('add.product');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.delete');


// &&&&&&&&&&&&& Repository Base &&&&&&&&&&&&
Route::get('/news', 'App\Http\Controllers\NewsController@index')->name('news.index');
Route::get('/news/create', 'App\Http\Controllers\NewsController@showModel')->name('news.create');

Route::post('/news/create', 'App\Http\Controllers\NewsController@store')->name('news.createModel');
Route::get('/news/edit/{id}', 'App\Http\Controllers\NewsController@getEdit')->name('news.edit');
Route::put('/news/update', 'App\Http\Controllers\NewsController@update')->name('news.update');
Route::delete('/news/destroy/{id}', 'App\Http\Controllers\NewsController@destroy')->name('news.destroy');

// Route::get('/news_livewire', NewsLiveWire::class);



// ................................. USER .......................................

Route::get('/site', [SiteController::class, 'index'])->middleware('auth');

