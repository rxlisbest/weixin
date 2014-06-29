<?php

class ShopUserController extends \ShopUserBaseController {

	public function getIndex($shopName='roy', $status=1) {
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		$item_order = new ShopItemOrder();
		$order_detail = new ShopOrderDetail();

		$item_orders = $item_order->OrderBy('id', 'desc')->WhereRaw('status=? and userId=?',array($status, $this->userInfo["id"]))->get() ?: array();
		//var_dump($item_orders);exit;
		$orders = array();
		foreach ($item_orders as  $key=>$value)
		{	

			//var_dump($key);exit;
			$order_details = $order_detail->whereRaw('orderId = ?', array($value->orderId))->get() ?: array();
			foreach ($order_details as $val){
				$items = array('title'=>$val->title,'img'=>$val->img,'price'=>$val->price,'quantity'=>$val->quantity,'itemId'=>$val->itemId);
				$orders[$key]['items'][]=$items;

				//var_dump($item_orders);exit;
			}

			$content = array('status','order_sumPrice','orderId','add_time');
			foreach ($content as $v) {
				$orders[$key][$v] = $value->{$v};
			}
		}  

		$data["status"] = $status;
		$data["item_orders"] = $orders;
		//var_dump($item_orders);
		return View::make('shop.default.User.index')->with($data);
		//return $orders;
	}

	public function getLogin() {
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.User.login')->with($data);
	}

	public function getRegister() {
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.User.register')->with($data);
	}

	public function postRegister() {
		$user = new ShopUser();
		$user->username = Input::get('user_name');
		$user->email = Input::get('email');
		$user->password = md5(Input::get('password'));
		$user->shopId = $this->shopId;
		$user->save();
		return Redirect::to($this->shopName."/shopuser/login");
	}

	/**
	 * 收货地址
	 */
	public function getAddress($shopName='roy', $id=0) {
		$data = array();
		$data["shopName"] = $this->shopName;
		//var_dump($data);exit;
		$user_address_mod = new ShopAddress();
		if ($id) {
			$info = $user_address_mod->find($id);
			$data['info'] = $info;
		}

		$address_list = $user_address_mod->where('uid', '=', 1)->get();
		$data["address_list"] = $address_list;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.User.address')->with($data);
	}

	public function postAddress(){

	}

	public function getAddaddress()
	{
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.User.addaddress')->with($data);
	}

	public function postAddaddress(){
		$user_address = new ShopAddress();

		$user_address->consignee = Input::get("consignee");
		$user_address->sheng = Input::get("sheng");
		$user_address->shi = Input::get("shi");
		$user_address->qu = Input::get("qu");
		$user_address->address = Input::get("address");
		$user_address->mobile = Input::get("phone_mob");

		$user_address->uid = 1;

		if($user_address->save()!==false){
			return Redirect::to($this->shopName.'/shopuser/address');
		}
	}

	public function getEditaddress($shopName='roy', $id=0)
	{
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;

		$user_address = new ShopAddress();
		$data["user_address"] = $user_address->find($id);
		return View::make('shop.default.User.editaddress')->with($data);
	}

	public function postEditaddress($shopName='roy', $id=0){
		$user_address = ShopAddress::find($id);
		$user_address->consignee = Input::get("consignee");
		$user_address->sheng = Input::get("sheng");
		$user_address->shi = Input::get("shi");
		$user_address->qu = Input::get("qu");
		$user_address->address = Input::get("address");
		$user_address->mobile = Input::get("phone_mob");

		$user_address->uid = 1;

		if($user_address->save()!==false){
			return Redirect::to($this->shopName.'/shopuser/address');
		}
	}

	public function getDeladdress($shopName='roy', $id=0)
	{
		$user_address = ShopAddress::find($id);
		if($user_address->delete()!==false){
			return Redirect::to($this->shopName.'/shopuser/address');
		}
	}
}
