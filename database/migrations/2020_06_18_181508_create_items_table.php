<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemsTable extends Migration {

	public function up()
	{
		Schema::create('items', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('type_number', 255);
			$table->integer('quantity')->nullable()->default('0');
			$table->string('name', 255);
			$table->integer('ord_coun')->nullable()->default('0');
			$table->integer('res_coun')->nullable()->default('0');
			$table->integer('type_id');
			$table->integer('category_id');
		});
	}

	public function down()
	{
		Schema::drop('items');
	}
}