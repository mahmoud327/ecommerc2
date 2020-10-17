<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('shop_name', 255)->nullable();
			$table->string('responsible_name', 255);
			$table->string('delegate_name', 255);
			$table->string('address', 255);
			$table->string('email', 255)->nullable();
			$table->string('username', 255);
			$table->string('password', 255);
			$table->string('phone', 60);
			$table->integer('ord_coun')->nullable()->default('0');
			$table->boolean('activate')->nullable()->default(0);
			$table->integer('res_coun')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}