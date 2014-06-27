<?php

class ShopCartController extends \BaseController {

	public function getIndex(){
		$cart = new Cart();  
		$items = Session::get('cart');
		$sumPrice = $cart->getPrice();
		//$this->_config_seo();
		$index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
		return View::make('shop.default.Shopcart.index')->with(array('items'=>$items,'index_cate_list'=>$index_cate_list,'sumPrice'=>$sumPrice));
	}

	public function postAddcart()
	{	

		$cart = new Cart();

		$goodId = Input::get('goodId');//商品ID
		$quantity = Input::get('quantity');//购买数量
		$item = Item::find($goodId);
		//var_dump($item->price);exit;
		if(!is_object($item)){
			$data = array('status'=>0,'msg'=>'不存在该商品','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
		}
		elseif($item->goods_stock<$quantity){
			$data = array('status'=>0,'msg'=>'没有足够的库存','count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice());
		}
		else {
			$result = $cart->addItem($item->id,$item->title,$item->price,$quantity,$item->img);
			if($result==1)//购物车存在该商品
			{
				$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'该商品已经存在购物车');
			}else{
				$data=array('result'=>$result,'status'=>1,'count'=>$cart->getCnt(),'sumPrice'=>$cart->getPrice(),'msg'=>'商品已成功添加到购物车');
			}
		}

		//$data=array('status'=>2);
		echo json_encode($data);
	}

	public function postChangequantity()
	{
		$cart = new Cart();

		$itemId = Input::get('itemId');//商品ID
		$quantity= Input::get('quantity');//购买数量

		$item = ShopItem::find($itemId);
		if($item->goods_stock<$quantity)
		{
			$data=array('status'=>0,'msg'=>'该商品的库存不足');
		}else {
			$cart->modNum($itemId,$quantity);
			$data=array('status'=>1,'item'=>$cart->getItem($itemId),'sumPrice'=>$cart->getPrice());
		}


		echo json_encode($data);
	}

	public function postRemovecartitem()//删除购物车商品
	{
		$cart=new Cart();

		$goodId = Input::get('itemId');//商品ID
		$cart->delItem($goodId);
		$data = array('status'=>1);
		echo json_encode($data);
	}
}
