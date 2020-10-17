<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {

			$table->increments('id');
			$table->timestamps();
			$table->string('part_number', 255);
			$table->integer('quantity');
			$table->float('price');
			$table->string('name');
			$table->integer('type_id');
			$table->integer('max_qun');
			$table->integer('min_qun');
			$table->integer('category_id');
			$table->integer('offer_id');

		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}