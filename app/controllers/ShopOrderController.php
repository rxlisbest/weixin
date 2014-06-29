<?php

class ShopOrderController extends ShopBaseController {

	public  function getCancelorder($shopName='roy',$orderId=0)//取消订单
	{
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		$data["orderId"] = $orderId;
		return View::make('shop.default.Order.cancelOrder')->with($data);
	}

	public function postCloseorder($shopName='roy',$orderId=0)//关闭订单
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


				foreach ($order_details as $val){
					$item = ShopItem::find($val->itemId);
					//var_dump($val->itemId);exit;
					$item->goods_stock += $val->quantity;
					$item->save();
				}
				return Redirect::to($this->shopName.'/shopuser/index');
			}
			else{
				echo '关闭订单失败!';
			}
		}
	}

	public function getCheckorder($shopName='roy', $orderId=0, $status=1)//查看订单
	{
		$data["shopName"] = $this->shopName;
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
				//$order[$key]['items'][]= $items;
				$item_detail[]= $items;
			}
		}

		$data["order"] = $order;
		$data["item_detail"] = $item_detail;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.Order.checkOrder')->with($data);
	}

	public function getConfirmorder($shopName='roy', $orderId=0, $status=1)//确认收货
	{
		$item_order = ShopItemOrder::WhereRaw('orderId=? and userId=? and status=3', array($orderId, 1))->first();
		if(!$item_order){
			echo "222";
		}
		$item_order->status = 4;//收到货
		if($item_order->save()){
			$order_detail = new ShopOrderDetail();
			$order_details = $order_detail->where('orderId', '=', $orderId)->get();
			foreach ($order_details as $val)
			{
				$item = ShopItem::find($val->itemId);
				//var_dump($val);var_dump($item);exit;
				$item->buy_num += $val->quantity;
				$item->save();
			}
			return Redirect::to($this->shopName.'/shopuser/index/'.$status);
		}
		else {
			/*$this->error('确定收货失败');*/
			echo "222";
		}

	}

	public function getJiesuan(){//结算
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		if(Session::has("cart"))
		{
			$user_address_mod = new ShopAddress();
			$address_list = $user_address_mod->where('uid', '=', 1)->get();
			$data["address_list"] = $address_list;
			$items = new ShopItem();
			$pingyou=0;
			$kuaidi=0;
			$ems=0;
			$freesum=0;
			foreach (Session::get("cart") as $item)
			{
				$free= $items->WhereRaw('free=? and id=?', array(2, $item["id"]))->first();
				if($free)
				{	
					$free = $free->toArray();
					$pingyou += $free['pingyou'];
					$kuaidi += $free['kuaidi'];
					$ems += $free['ems'];
					$freesum += $free['pingyou']+$free['kuaidi']+$free['ems'];
				}
			}

			//   $dingdanhao = date("Y-m-dH-i-s");
			// $dingdanhao = str_replace("-","",$dingdanhao);
			// $dingdanhao .= rand(1000,2000);
			$cart=new Cart();
			$sumPrice = $cart->getPrice();

			$freearr=array();
			if($pingyou>0)
			{
				$freearr[]=array('value'=>1,'price'=>$pingyou);
			}
			if($kuaidi>0)
			{
				$freearr[]=array('value'=>2,'price'=>$kuaidi);
			}
			if($ems>0)
			{
				$freearr[]=array('value'=>3,'price'=>$ems);
			}


			// var_dump($freearr);
			$data["freearr"] = $freearr;
			$data["freesum"] = $freesum;
			$data["sumPrice"] = $sumPrice;
			//$this->assign('pingyou',$pingyou);
			//$this->assign('kuaidi',$kuaidi);
			//$this->assign('ems',$ems);

			return View::make('shop.default.Order.jiesuan')->with($data);
		}else 
		{
			return Redirect::to($this->shopName.'/shopcart/index');
		}
	}

	public function postCreateorder(){
		$data["shopName"] = $this->shopName;
		$data["item_class_list"] = $this->item_class_list;
		$cart=new Cart();	
		$user_address = new ShopAddress();
		$item_order = new ShopItemOrder();
		$order_detail = new ShopOrderDetail;
		$item = new ShopItem;
		/*$this->visitor->info['id'];//用户ID
		$this->visitor->info['username'];//用户账号*/

		//生成订单号
		$dingdanhao = date("YmdHis");
		$dingdanhao .= rand(1000,2000);

		$time = date("Y-m-d H:i:s");//订单添加时间
		$address_options = Input::get('address_options');//地址  0：刚填的地址 大于0历史的地址
		$shipping_id = Input::get('shipping_id');//配送方式
		$postscript = Input::get('postscript');//卖家留言

		if(!empty($postscript))//卖家留言
		{
			$item_order->note = $postscript;
		}

		if(empty($shipping_id))//卖家包邮
		{
			$item_order->freetype = 0;
			$item_order->order_sumPrice = $cart->getPrice();
		}else 
		{
			$item_order->freetype = $shipping_id;
			$item_order->freeprice = $this->getFree($shipping_id);//取到运费
			$item_order->order_sumPrice = $cart->getPrice()+$this->getFree($shipping_id);

			//echo $cart->getPrice()+$this->getFree($shipping_id);exit;
		}

		$item_order->orderId = $dingdanhao;//订单号
		$item_order->add_time = $time;//添加时间
		$item_order->goods_sumPrice = $cart->getPrice();//商品总额
		$item_order->userId = 1;//用户ID
		$item_order->userName = "roy";//用户名
		if($address_options==0)
		{
			$consignee = Input::get('consignee');//真实姓名
			$sheng = Input::get('sheng');//省
			$shi = Input::get('shi');//市
			$qu = Input::get('qu');//区
			$address = Input::get('address');//详细地址
			$phone_mob = Input::get('phone_mob');//电话号码
			$save_address = Input::get('save_address');//是否保存地址

			$item_order->address_name = $consignee;//收货人姓名
			$item_order->mobile = $phone_mob;//电话号码
			$item_order->address = $sheng.$shi.$qu.$address;//地址

			if($save_address)//保存地址
			{
				$user_address->uid = 1;
				$user_address->consignee = $consignee;
				$user_address->address = $address;
				$user_address->mobile = $phone_mob;
				$user_address->sheng = $sheng;
				$user_address->shi = $shi;
				$user_address->qu = $qu;

				$user_address->save();
			}

		}else{

			$address= $user_address->where('uid', '=', 1)->find($address_options);//取到地址

			$item_order->address_name = $address->consignee;//收货人姓名
			$item_order->mobile = $address->phone_mob;//电话号码
			$item_order->address = $address->sheng.$address->shi.$address->qu.$address->address;//地址
		}
		if($orderid = $item_order->save())//添加订单成功
		{
			$order_detail->orderId = $dingdanhao;
			foreach (Session::get("cart") as $val)
			{

				$item->find($val['id']);
				$item->goods_stock -= $val['num'];
				$item->save();

				$order_detail->itemId = $val['id'];//商品ID
				$order_detail->title = $val['name'];//商品名称
				$order_detail->img = $val['img'];//商品图片
				$order_detail->price = $val['price'];//商品价格 
				$order_detail->quantity = $val['num'];//购买数量
				$order_detail->save();
			}


			$cart->clear();//清空购物车
			
			$data["orderid"] = $orderid;
			$data["dingdanhao"] = $dingdanhao;
			$data["order_sumPrice"] = $item_order->order_sumPrice;

		}else 
		{
			$this->error('生成订单失败!');
		}
		return View::make('shop.default.Order.pay')->with($data);
	}
}
