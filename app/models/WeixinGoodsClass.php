<?php

class WeixinGoodsClass extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weixin_goods_class';

	public function weixingoods(){
		return $this->hasMany('WeixinGoods' ,'class_path', 'path');
	}
}
