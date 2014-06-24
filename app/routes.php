<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::group(array('before' => 'auth'), function()
{
    	Route::controller('setting','SettingController');
	
});
Route::controller('item','ItemController');
Route::controller('itemclass','ItemclassController');
Route::controller('users','UsersController');
