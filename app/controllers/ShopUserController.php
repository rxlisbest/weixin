<?php

class ShopUserController extends ShopUserBaseController {

    public function getIndex() {
    	//return 111;
    	$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		$item_order = new ShopItemOrder();
		$order_detail = new ShopOrderDetail();
		if(!isset($_GET['status'])){
			$status = 1;
		}
		else{
			$status = $_GET['status'];
		}

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

			$content = array('order_sumPrice','orderId','add_time');
			foreach ($content as $v) {
				$orders[$key][$v] = $value->{$v};
			}
		}  

		//var_dump($item_orders);
		return View::make('shop.default.User.index')->with(array('item_orders'=>$orders,'index_cate_list'=>$index_cate_list));
		//return $orders;
    }
}
