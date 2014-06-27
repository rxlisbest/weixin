<?php

class ShopUserController extends \BaseController {

	public function getIndex($status=1) {
		//return 111;
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["index_cate_list"] = $index_cate_list;
		$item_order = new ShopItemOrder();
		$order_detail = new ShopOrderDetail();

		$item_orders = $item_order->OrderBy('id', 'desc')->WhereRaw('status=? and userId=?',array($status, 1))->get() ?: array();
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
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["index_cate_list"] = $index_cate_list;
		return View::make('shop.default.User.login')->with($data);
	}

	public function getRegister() {
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["index_cate_list"] = $index_cate_list;
		return View::make('shop.default.User.register')->with($data);
	}

	/**
	 * 收货地址
	 */
	public function getAddress($id=0) {
		$user_address_mod = new ShopAddress();
		$data = array();
		if ($id) {
			$info = $user_address_mod->find($id);
			$data['info'] = $info;
		}

		$address_list = $user_address_mod->where('uid', '=', 1)->get();
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["address_list"] = $address_list;
		$data["index_cate_list"] = $index_cate_list;
		return View::make('shop.default.User.address')->with($data);
	}

	public function postAddress(){

	}

	public function getAddaddress()
	{
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["index_cate_list"] = $index_cate_list;
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
			return Redirect::to('shopuser/address');
		}
	}

	public function getEditaddress($id=0)
	{
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$data["index_cate_list"] = $index_cate_list;

		$user_address = new ShopAddress();
		$data["user_address"] = $user_address->find($id);
		return View::make('shop.default.User.editaddress')->with($data);
	}

	public function postEditaddress($id=0){
		$user_address = ShopAddress::find($id);
		$user_address->consignee = Input::get("consignee");
		$user_address->sheng = Input::get("sheng");
		$user_address->shi = Input::get("shi");
		$user_address->qu = Input::get("qu");
		$user_address->address = Input::get("address");
		$user_address->mobile = Input::get("phone_mob");

		$user_address->uid = 1;

		if($user_address->save()!==false){
			return Redirect::to('shopuser/address');
		}
	}

	public function getDeladdress($id=0)
	{
		$user_address = ShopAddress::find($id);
		if($user_address->delete()!==false){
			return Redirect::to('shopuser/address');
		}
	}
}
