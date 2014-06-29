<?php
/**
 * 访问者
 *
 * @author andery
 */
class UserVisitor {

	public $is_login = false; //登陆状态
	public $info = null;

	public function __construct() {
		/*header("Content-type: text/html; charset=utf-8");
		  $user_agent = $_SERVER['HTTP_USER_AGENT'];
		  if (strpos($user_agent, 'MicroMessenger') === false) {
		// 非微信浏览器禁止浏览
		echo "亲，只能在微信内访问...";exit;
		}*/     
	}

	public function check($shopName=''){
		if (Session::has('user_info')) {
			//已经登陆
			$user_info = Session::get('user_info');
			$shopId = User::where('username', '=', $shopName)->first()->id;
			$user = ShopUser::WhereRaw('username=? and password=? and shopId=?', array($user_info['username'], $user_info['password'], $shopId))->first();
			//$this->info = Session::push('user_info.id',id);
			if($user)
				$this->is_login = true;
			else
				$this->is_login = false;

		} 
		else {
			$this->is_login = false;
		}
	}

	public function login_check($username='', $password='', $shopName=''){
		$shopId = User::where('username', '=', $shopName)->first()->id;
		$user = ShopUser::WhereRaw('username=? and password=? and shopId=?', array($username, md5($password), $shopId))->first();
		//$this->info = Session::push('user_info.id',id);
		if($user){
			$user = $user->toArray();
			Session::put("user_info", $user);
			$cart = ShopCart::WhereRaw('userId=? and shopId=?', array($user["id"], $shopId))->get();
			if($cart){
				$cart = $cart->toArray();
				$new_cart = array();
				foreach($cart as $k=>$val){
					$cart[$k]["id"] = $val["itemId"];
					unset($cart[$k]["itemId"]);
					$new_cart[$val["itemId"]] = $cart[$k];
					unset($cart[$k]);
				}
				Session::put("cart", $new_cart);
			}
			return true;
		}
		else
			return false;
	}

	public function register_check($username='', $shopName=''){
		$shopId = User::where('username', '=', $shopName)->first()->id;
		$user = ShopUser::WhereRaw('username=? and shopId=?', array($username, $shopId))->first();
		//$this->info = Session::push('user_info.id',id);
		if($user){
			return true;
		}
		else
			return false;
	}
	/**
	 * 登陆会话
	 */
	public function assign_info($user_info) {
		session('user_info', $user_info);
		$this->info = $user_info;
	}

	/**
	 * 记住密码
	 */
	public function remember($user_info, $remember = null) {
		if ($remember) {
			$time = 3600 * 24 * 14; //两周
			cookie('user_info', array('id'=>$user_info['id'], 'password'=>$user_info['password']), $time);
		}
	}

	/**
	 * 获取用户信息
	 */
	public function get($key = null) {
		$info = null;
		if (is_null($key) && $this->info['id']) {
			$info = M('user')->find($this->info['id']);
		} else {
			if (isset($this->info[$key])) {
				return $this->info[$key];
			} else {
				//获取用户表字段
				$fields = M('user')->getDbFields();
				if (!is_null(array_search($key, $fields))) {
					$info = M('user')->where(array('id' => $this->info['id']))->getField($key);
				}
			}
		}
		return $info;
	}

	/**
	 * 登陆
	 */
	public function login($uid, $remember = null) {
		$user_mod = M('user');
		//更新用户信息
		$user_mod->where(array('id' => $uid))->save(array('last_time' => time(), 'last_ip' => get_client_ip()));
		$user_info = $user_mod->field('id,username,password')->find($uid);
		//保持状态
		$this->assign_info($user_info);
		$this->remember($user_info, $remember);
	}

	/**
	 * 退出
	 */
	public function logout() {
		session('user_info', null);
		cookie('user_info', null);
	}

}
