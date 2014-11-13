<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('givenname', 50);
			$table->string('surname', 50);
			$table->string('username', 10);
			$table->string('email', 50);
			$table->string('photo', 100);
			$table->string('password');
			$table->string('password_temp');
			$table->string('resetcode');
			$table->string('access', 10);
			$table->string('active', 1);
			$table->string('isdel', 1);
			$table->timestamp('last_login');
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
