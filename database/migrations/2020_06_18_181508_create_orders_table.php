<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id');
			$table->float('total')->default(0);
			$table->enum('type', array('sail', 'reservation'));

		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}