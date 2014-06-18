<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeixinTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('weixin_nav', function(Blueprint $table)
		{
		    $table->increments('id');

		    $table->string('name', 30);
		    $table->string('url', 30);
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
		Schema::drop('weixin_nav');
	}

}
