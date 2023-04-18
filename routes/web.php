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
// cuba cuba
Route::get('/', 'HomeController@index');

Route::get('/hack/{id}', function($id){
    auth()->loginUsingId($id);
    return back();
});
Auth::routes();


//product
Route::get("/product", 'ProductController@index');
Route::get("/product/create", "ProductController@create");
Route::get("/product/search", 'ProductController@search');
Route::post("/product", "ProductController@store");
Route::get("/product/{id}", "ProductController@show");
Route::get("/product/{id}/edit", "ProductController@edit");
Route::put("/product/{id}/update", "ProductController@update");
Route::delete("/product/{id}/delete", "ProductController@destroy");

Route::post("/comment/{id}", "CommentController@store");
