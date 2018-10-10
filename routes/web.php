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

Route::get('/basetemplate', function() {
	return view('welcome');
});

Route::middleware("localization")->group(function() {
	Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");

	// GET DATA USERS
	Route::get("/users", "UserController@index")->name("users.index");

	// CREATE DATA USER
	Route::get("/users/create", "UserController@create")->name("users.create");
	Route::post("/users", "UserController@store")->name("users.store");

	// UPDATE DATA USER
	Route::get("/users/{id}", "UserController@edit")->name("users.edit");
	Route::put("/users/{id}", "UserController@update")->name("users.update");



	// Route::resource("dashboard", "DashboardController");
	Route::resource("products", "ProductController", ['except' => ['destroy'] ]);
	Route::get('products/{products}/delete', ['as' => 'products.delete', 'uses' => 'ProductController@destroy']);
});

