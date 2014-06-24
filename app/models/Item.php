<?php

class Item extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weixin_item';
	public $timestamps = FALSE;

	public function itemclass(){
		return $this->belongsTo('Item', 'cate_id', 'id');
	}
}
