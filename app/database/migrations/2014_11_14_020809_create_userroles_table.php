<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserrolesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userroles', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent');
			$table->string('name');
			$table->integer('level');
			$table->string('descr');
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
		Schema::drop('userroles');
	}

}
