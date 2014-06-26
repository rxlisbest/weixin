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
		$item = new ShopItem();
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
				$order_details = $order_detail->where('orderId='.$orderId)->select();

				foreach ($order_details as $val){
					$item->where('id='.$val['itemId'])->setInc('goods_stock',$val['quantity']);
				}
				$this->redirect('shopuser/index');
			}
			else{
				$this->error('关闭订单失败!');
			}
		}
	}
}
