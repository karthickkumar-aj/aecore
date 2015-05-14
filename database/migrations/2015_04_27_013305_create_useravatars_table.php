<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUseravatarsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('useravatars', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('user_id');
			$table->integer('file_id_sm')->nullable();
			$table->integer('file_id_lg')->nullable();
			$table->timestamps();
      $table->dropPrimary('useravatars_pkey');
      $table->primary('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('useravatars');
	}

}
