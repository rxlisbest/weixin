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
/*微信网站*/
Route::controller('{shopname}/shopindex','ShopIndexController');
Route::controller('{shopname}/shopitem','ShopItemController');
Route::controller('{shopname}/shopbook','ShopBookController');
Route::controller('{shopname}/shopcart','ShopCartController');
//Route::controller('shopuser','ShopUserController');

Route::group(array('before' => 'shopauth'), function()
{
    Route::controller('{shopname}/shopuser','ShopUserController');
    Route::controller('{shopname}/shoporder','ShopOrderController');
	
});
/*后台*/
Route::controller('item','AdminItemController');
Route::controller('itemclass','AdminItemClassController');
Route::controller('users','UsersController');

Route::get('test',function(){
	/*$cart = new Cart();
	$cart->test(1);*/
	//Session::forget('cart');
	//Session::put('user_info', 111);
	return Session::all();
	return $name;
});

Route::get('test1',function(){
	/*$cart = new Cart();
	$cart->test(1);*/
	//Session::forget('cart');
	Session::put('user_info', 222);
	return Session::get('user_info');
	return $name;
});
