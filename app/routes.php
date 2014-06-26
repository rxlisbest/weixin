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
Route::controller('shopindex','ShopIndexController');
Route::controller('shopitem','ShopItemController');
Route::controller('shopbook','ShopBookController');
Route::controller('shopcart','ShopCartController');
Route::controller('shopuser','ShopUserController');
Route::controller('shoporder','ShopOrderController');


Route::controller('item','ItemController');
Route::controller('itemclass','ItemclassController');
Route::controller('users','UsersController');

Route::get('test',function(){
	/*$cart = new Cart();
	$cart->test(1);*/
	//Session::forget('cart');
	//return Session::get('cart')["124"];
	$name = Request::segment(2);
	return $name;
});
