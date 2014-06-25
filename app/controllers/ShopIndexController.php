<?php

class ShopIndexController extends \BaseController {

    public function getIndex()
    {	
	//var_dump(111);
        /*****首页广告***/
        $ads = ShopAd::all();
        /*****首页广告end******/

        /****最新商品*****/
        $news = Item::where('news', '=', 1)->get();
        /****最新商品 END*****/

        /****推荐商品*****/
        $tuijian = Item::where('tuijian', '=', 1)->get();
        /****推荐商品 END*****/

        $items = Item::with('Itemclass')->where('status', '=', 1)->get() ?: array();
        $index_cate_list = ItemClass::where('status', '=', 1)->get() ?: array();
        //var_dump($items);
        return View::make('shop.default.Index.index')->with(array('ads'=>$ads,'news'=>$news,'tuijian'=>$tuijian,'items'=>$items,'index_cate_list'=>$index_cate_list));
    }
}
