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

Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/hello', 'HomeController@index');
Route::get('/login', 'LoginController@index');
Route::post('/register', 'LoginController@register');
/* 生成二维码*/
Route::get('/index', function()
{	
	$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
	$filename = $PNG_TEMP_DIR.time().'.png';
        echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
	QRcode::png('http://www.baidu.com/',$filename);
	return $filename;
});
