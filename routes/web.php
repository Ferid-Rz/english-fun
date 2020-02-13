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


Auth::routes();



Route::group(['middleware' => ['auth']], function () { 
    Route::get('/add', 'WordsController@addWord');
    Route::post('/add', 'WordsController@storeWord');

    Route::get('/delete', 'WordsController@deleteWordView');
    Route::post('/delete', 'WordsController@deleteWord');

    Route::get('/hardReset', 'WordsController@hardReset');

    Route::post('/save', 'WordsController@store');

    Route::get('/many', 'WordsController@many');
    Route::post('/many', 'WordsController@storeMany');
});