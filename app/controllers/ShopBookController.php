<?php

class ShopBookController extends \BaseController {

    public function getCate($cate_id=0)
    {	
        $items = Item::with('Itemclass')->where('cate_id', '=', $cate_id)->get() ?: array();
        $index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
        //var_dump($items);
        return View::make('shop.default.book.cate')->with(array('items'=>$items,'index_cate_list'=>$index_cate_list));
    }
}
