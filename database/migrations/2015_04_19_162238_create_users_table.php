<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('usercode', 10)->unique();
			$table->string('name');
      $table->string('username')->unique();
			$table->string('email')->unique();
			$table->string('password', 64);
      $table->string('title');
      $table->string('timezone');
      $table->enum('signup_step', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'complete'])->default('1');
      $table->enum('status', ['static', 'active', 'disabled'])->default('static');
      $table->integer('company_id');
      $table->enum('company_user_access', ['standard', 'admin'])->default('standard');
      $table->enum('company_user_status', ['active', 'disabled'])->default('disabled');
			$table->rememberToken();
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
