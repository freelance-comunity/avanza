<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeelocationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employeelocations', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('country');
			$table->string('state');
			$table->string('municipality');
			$table->string('colony');
			$table->string('type_of_road');
			$table->string('name_road');
			$table->string('outdoor_number');
			$table->string('interior_number');
			$table->string('postal_code');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('employeelocations');
	}

}
