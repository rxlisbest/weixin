<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeixinGoodsClassTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('weixin_goods_class', function(Blueprint $table)
		{
		    $table->increments('id');

		    $table->string('name', 30);
		    $table->string('path', 20);
		    $table->string('sort', 20);
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('weixin_goods_class');
	}

}
