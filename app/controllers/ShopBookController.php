<?php

class ShopBookController extends \ShopBaseController {

	public function getCate($shopName='roy',$cate_id=0)
	{	
		$data["shopName"] = $this->shopName;
		$items = Item::with('Itemclass')->where('cate_id', '=', $cate_id)->get() ?: array();
		//var_dump($items);
		$data["item_class_list"] = $this->item_class_list;
		$data["items"] = $items; 
		return View::make('shop.default.book.cate')->with($data);
	}
}
