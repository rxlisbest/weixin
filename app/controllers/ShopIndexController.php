<?php

class ShopIndexController extends \BaseController {

    public function getIndex(){	
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

    public function postAjaxlogin(){
        
        $user_name = Input::get('user_name');
        $password = Input::get('password');

        $users = ShopUser::WhereRaw("username=? and password=?",array($user_name, md5($password)))->first();
        //var_dump($users);
        if($users) {
            $users = $users->toArray();
            $data = array('status'=>1);
            Session::put("user_info", $users);
            //var_dump(Session::get("user_info"));exit;
        }
        else {
            $data = array('status'=>0);
        }

        echo json_encode($data);
        exit;
    }

    public function postAjaxregister(){
        $username = Input::get('user_name');
        $count = ShopUser::where("username", "=", $username)->count();
        if($count>0){
            echo 'false';
        }
        else{
            echo 'true';
        }   
    }
}
