<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOffersTable extends Migration {

	public function up()
	{
		Schema::create('offers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image')->default('uploads/posts/1.png');
			$table->enum('sort', array('permanent', 'temporary'));
			$table->date('deadline')->nullable();
			$table->boolean('is_activated')->default(1);
		});
	}

	public function down()
	{
		Schema::drop('offers');
	}
}