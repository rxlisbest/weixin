<?php

class ShopTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('weixin_goods_class')->delete();
        WeixinGoodsClass::create(array(
            'name'     => '数码电器',
            'path' => '10',
            'sort'    => '1',
            'status'    => '1',
        ));
        WeixinGoodsClass::create(array(
            'name'     => '日用百货',
            'path' => '11',
            'sort'    => '2',
            'status'    => '1',
        ));
        WeixinGoodsClass::create(array(
            'name'     => '酒水饮料',
            'path' => '12',
            'sort'    => '3',
            'status'    => '1',
        ));
    }
}
