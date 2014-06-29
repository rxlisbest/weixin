<?php

class ItemClass extends Eloquent{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'weixin_item_class';
	public $timestamps = FALSE;
	public function item()
	{
		return $this->hasMany('Item');
	}
}
