<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeixinGoodsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('weixin_goods', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 50);
			$table->string('branch', 50);
			$table->string('image', 50);
			$table->float('retail_price');
			$table->float('standard_price');
			$table->integer('number');
			$table->text('detail', 23);
			$table->string('class_path', 20);
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
		Schema::drop('weixin_goods');
	}

}
