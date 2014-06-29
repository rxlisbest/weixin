<?php

class ShopItemController extends \ShopBaseController {

	public function getDetail($shopName='roy',$id = 0)
	{	
		$data["shopName"] = $this->shopName;
		$item = Item::find($id);
		//var_dump($items);
		$data["item"] = $item;
		$data["item_class_list"] = $this->item_class_list;
		return View::make('shop.default.Item.index')->with($data);
	}
}
