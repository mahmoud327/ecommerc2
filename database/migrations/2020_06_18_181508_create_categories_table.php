<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->unsignedInteger('parent_id')->nullable();
			$table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
			$table->string('name', 150);
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
