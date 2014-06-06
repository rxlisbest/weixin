<?php

class LoginController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index()
	{
		return View::make('login');
	}

	public function register(){
		$post = json_decode(file_get_contents('php://input'));
		$field = array(
				'email'=>'邮箱',
				'username'=>'用户名',
				'password'=>'密码',
				'repeat_password'=>'确认密码',
			);
		$error = array();
		foreach($field as $key=>$value){
			if(!$post->$key){
				$error[$key] = $value."不能为空!";
			}
			else{
				$error[$key] = "";
			}
		}
		if($post->password != $post->repeat_password){
			$error["repeat_password"] = "两次输入的密码不相同!";
		}
		$user = new WeixinUser();
		if($user->where('u_name','=',$post->username)->count() > 0){
			$error["username"] = "用户名己存在!";
		}	
			
		foreach($error as $value){
			if($value){
				return json_encode($error);
			}
		}
		$user->u_name = $post->username;
		$user->u_email = $post->email;
		$user->u_password = md5($post->password);
		$user->save();
		return json_encode($post);
	}
}
