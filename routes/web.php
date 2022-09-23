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

use App\Category;

Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@PostLoginAdmin');
Route::get('/home', function () {
    return view('home');
});

Route::prefix('admin')->group(function () {

    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses'=> 'CategoryController@index'
    
        ] );
        Route::get('/create', [
            'as' => 'categories.create',
            'uses'=> 'CategoryController@create'
     
        ] );
        Route::post('/store', [
            'as' => 'categories.store',
            'uses'=> 'CategoryController@store'
     
        ] );
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses'=> 'CategoryController@edit'
     
        ] );
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses'=> 'CategoryController@update'
     
        ] );
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses'=> 'CategoryController@delete'
     
        ] );
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses'=> 'MenuController@index'
    
        ] );
        Route::get('/create', [
            'as' => 'menus.create',
            'uses'=> 'MenuController@create'
            
        ] );
        Route::post('/store', [
            'as' => 'menus.store',
            'uses'=> 'MenuController@store'
     
        ] );
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses'=> 'MenuController@edit'
     
        ] );
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses'=> 'MenuController@update'
     
        ] );
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses'=> 'MenuController@delete'
     
        ] );
       
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses'=> 'AdminProductController@index'
    
        ] );
        Route::get('/create', [
            'as' => 'product.create',
            'uses'=> 'AdminProductController@create'
            
        ] );
       
    });
});






