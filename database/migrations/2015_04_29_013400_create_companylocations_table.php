<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanylocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companylocations', function(Blueprint $table)
		{
      $table->increments('id');
      $table->integer('company_id');
			$table->string('street')->nullable();
			$table->string('city')->nullable();
			$table->string('state')->nullable();
			$table->string('country')->nullable();
			$table->string('zipcode')->nullable();
			$table->string('phone')->nullable();
			$table->string('fax')->nullable();
			$table->string('website')->nullable();
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
		Schema::drop('companylocations');
	}

}
