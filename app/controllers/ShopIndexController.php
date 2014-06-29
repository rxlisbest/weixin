<?php

class ShopIndexController extends \ShopBaseController {

	public function getIndex(){	
		$data["shopName"] = $this->shopName;
		//var_dump(111);
		/*****首页广告***/
		$ads = ShopAd::all();
		/*****首页广告end******/

		/****最新商品*****/
		$news = Item::where('news', '=', 1)->get();
		/****最新商品 END*****/

		/****推荐商品*****/
		$tuijian = Item::where('tuijian', '=', 1)->get();
		/****推荐商品 END*****/

		$items = Item::with('Itemclass')->where('status', '=', 1)->get() ?: array();
		//var_dump($items);
		$data["ads"] = $ads; 
		$data["news"] = $news; 
		$data["tuijian"] = $tuijian; 
		$data["item_class_list"] = $this->item_class_list;
		$data["items"] = $items; 
		return View::make('shop.default.Index.index')->with($data);
	}

	public function postAjaxlogin(){

		$user_name = Input::get('user_name');
		$password = Input::get('password');

		$uservisitor = new UserVisitor();
		$login = $uservisitor->login_check($user_name, $password, $this->shopName);
		//var_dump($users);
		if($login) {
			$data = array('status'=>1);
			//var_dump(Session::get("user_info"));exit;
		}
		else {
			$data = array('status'=>0);
		}

		echo json_encode($data);
		return ;
	}

	public function postAjaxregister(){
		$user_name = Input::get('user_name');
		$uservisitor = new UserVisitor();
		$register = $uservisitor->register_check($user_name, $this->shopName);
		if($register){
			echo 'false';
		}
		else{
			echo 'true';
		}   
		return ;
	}
}
