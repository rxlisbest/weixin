<?php

class ShopItemController extends \BaseController {

    public function getDetail($id = 0)
    {	
        $item = Item::find($id);
        $index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
        //var_dump($items);
        return View::make('shop.default.Item.index')->with(array('item'=>$item,'index_cate_list'=>$index_cate_list));
    }
}
