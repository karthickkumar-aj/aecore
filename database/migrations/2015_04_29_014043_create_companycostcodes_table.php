<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanycostcodesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companycostcodes', function(Blueprint $table)
		{
      $table->increments('id');
      $table->integer('company_id');
			$table->string('code'); //i.e. 0990
			$table->string('description'); //i.e. Painting
			$table->string('status'); // active, disabled
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
		Schema::drop('companycostcodes');
	}

}
