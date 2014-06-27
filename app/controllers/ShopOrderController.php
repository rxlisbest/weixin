<?php

class ShopOrderController extends ShopUserBaseController {

	public  function getCancelorder($orderId=0)//取消订单
	{
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		return View::make('shop.default.Order.cancelOrder')->with(array('orderId'=>$orderId,'index_cate_list'=>$index_cate_list));
	}

	public function postCloseorder($orderId=0)//关闭订单
	{

		//$orderId = Input::get("orderId");
		$cancel_reason = Input::get("cancel_reason");
		$order_detail = new ShopOrderDetail();
		$order = ShopItemOrder::WhereRaw('orderId = ? and userId = ?', array($orderId, 1))->first();
		//var_dump($order);exit;
		if(0){
			echo 111;
		}
		else{
			$item_order = ShopItemOrder::where('orderId', '=', $orderId)->first();
			$item_order->closemsg = $cancel_reason;
			$item_order->status = 5;

			if($item_order->save()){//设置为关闭
				$order_details = $order_detail->where('orderId', '=', $orderId)->get();

				/*购物车的数量加回到库存数量*/
				foreach ($order_details as $val){
					$item = ShopItem::find($val->itemId);
					//var_dump($val->itemId);exit;
					$item->goods_stock += $val->quantity;
					$item->save();
				}
				return Redirect::to('shopuser/index');
			}
			else{
				echo '关闭订单失败!';
			}
		}
	}

	public function getCheckorder($orderId=0, $status=1)//查看订单
	{
		$order = ShopItemOrder::WhereRaw('orderId = ? and userId = ?', array($orderId, 1))->first();
		if(0){
			echo '该订单不存在';
		}else 
		{

			$order_detail = new ShopOrderDetail();
			$order_details = $order_detail->where('orderId', '=', $orderId)->get();
			$item_detail=array();
			foreach ($order_details as $val)
			{
				$items = array('title'=>$val->title,'img'=>$val->img,'price'=>$val->price,'quantity'=>$val->quantity);
				//$order[$key]['items'][]=$items;
				$item_detail[]=$items;
			}
		}

		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		return View::make('shop.default.Order.checkOrder')->with(array('item_detail'=>$item_detail,'order'=>$order,'index_cate_list'=>$index_cate_list));
	}
}
