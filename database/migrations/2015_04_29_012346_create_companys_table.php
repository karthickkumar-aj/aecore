<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companys', function(Blueprint $table)
		{
      $table->increments('id');
      $table->string('companycode', 10)->unique();
			$table->string('name');
			$table->string('type');
			$table->string('labor'); //union, non-union, not applicable
			$table->string('account')->default('free'); //free, townhouse, midrise, skyscraper
			$table->string('status')->default('active'); //active, disabled			
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
		Schema::drop('companys');
	}

}
