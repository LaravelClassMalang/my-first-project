<?php

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

// Route::get('/admin/dashboard', function () {
//     return trans("messages.dashboard");
// })->name("home");

//this comment for index
Route::get('/basetemplate', function() {
	return view('welcome');
});

Route::middleware("localization")->group(function() {
	Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");

	Route::get("/users", "UserController@index")->name("users.index");

	// Route::resource("dashboard", "DashboardController");
	Route::resource("products", "ProductController", ['except' => ['destroy'] ]);
	Route::get('products/{products}/delete', ['as' => 'products.delete', 'uses' => 'ProductController@destroy']);

	Route::resource("category", "CategoryController", ['except' => ['destroy'] ]);
	Route::get('category/{category}/delete', ['as' => 'category.delete', 'uses' => 'CategoryController@destroy']);
});

