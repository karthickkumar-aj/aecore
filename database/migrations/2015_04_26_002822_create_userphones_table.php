<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserphonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('userphones', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('user_id');
			$table->string('direct');
			$table->string('mobile');
			$table->timestamps();
      $table->dropPrimary('userphones_pkey');
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
		Schema::drop('userphones');
	}

}
