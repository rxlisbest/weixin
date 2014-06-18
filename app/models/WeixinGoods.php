<?php

class WeixinGoods extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weixin_goods';
	
	public function weixingoodsclass(){
		return $this->belongsTo('WeixinGoodsClass', 'class_path', 'path');
	}
}
