<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateS3filesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('s3files', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('user_id');
			$table->string('file_bucket');
			$table->string('file_path');
			$table->string('file_name');
			$table->integer('file_size');
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
		Schema::drop('s3files');
	}

}
