<?php
class Cart{
    public function __construct() {
        if(!Session::has('cart')){
            Session::put('cart', array());
        }
    }
    


    /*
    添加商品
    param int $id 商品主键
          string $name 商品名称
          float $price 商品价格
          int $num 购物数量
    */
    public  function addItem($id,$name,$price,$num,$img) {
        //如果该商品已存在则直接加其数量
        if (Session::has('cart.'.$id)) {
            //$this->incNum($id,$num);
            
            return 1;
        }
        
        $item = array();
        $item['id'] = $id;
        $item['name'] = $name;
        $item['price'] = $price;
        $item['num'] = $num;
        $item['img'] = $img;
        Session::put('cart.'.$id, $item);
    }

    /*
    修改购物车中的商品数量
    int $id 商品主键
    int $num 某商品修改后的数量，即直接把某商品
    的数量改为$num
    */
    /*测试类*/
    /*public function test($id) {
        Session::put('cart.'.$id.'.num', 100);
    }*/

    public function modNum($id,$num=1) {
        if (!Session::has('cart.'.$id)) {
            return false;
        }
        Session::put('cart.'.$id.'.num', $num);
    }

    /*
    商品数量+1
    */
    public function incNum($id,$num=1) {
        if (Session::has('cart.'.$id)) {
            Session::put('cart.'.$id.'.num',Session::get('cart.'.$id.'.num')+$num);
        }
    }

    /*
    商品数量-1
    */
    public function decNum($id,$num=1) {
        if (Session::has('cart.'.$id)) {
            Session::put('cart.'.$id.'.num',Session::get('cart.'.$id.'.num')-$num);
        }

        //如果减少后，数量为0，则把这个商品删掉
        if (Session::get('cart.'.$id.'.num')<1) {
            $this->delItem($id);
        }
    }

    /*
    删除商品
    */
    public function delItem($id) {
        Session::forget('cart.'.$id);
    }
    
    /*
    获取单个商品
    */
    public function getItem($id) {
        return Session::get('cart.'.$id);
    }

    /*
    查询购物车中商品的种类
    */
    public function getCnt() {
        return count(Session::get('cart'));
    }
    
    /*
    查询购物车中商品的个数
    */
    public function getNum(){
        if ($this->getCnt() == 0) {
            //种数为0，个数也为0
            return 0;
        }

        $sum = 0;
        $data = Session::get('cart');
        foreach ($data as $item) {
            $sum += $item['num'];
        }
        return $sum;
    }

    /*
    购物车中商品的总金额
    */
    public function getPrice() {
        //数量为0，价钱为0
        if ($this->getCnt() == 0) {
            return 0;
        }
        $price = 0.00;
        foreach (Session::get('cart') as $item) {
            $price += $item['num'] * $item['price'];
        }
        return sprintf("%01.2f", $price);
    }

    /*
    清空购物车
    */
    public function clear() {
        Session::forget('cart');
    }
}