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
      $table->string('title')->nullable();
      $table->string('timezone')->nullable();
      $table->integer('signup_step')->default('1');
      $table->string('status')->default('static');
      $table->integer('company_id')->nullable();
      $table->string('company_user_access')->default('standard');
      $table->string('company_user_status')->default('disabled');
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
