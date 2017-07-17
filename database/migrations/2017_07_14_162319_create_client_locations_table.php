<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientLocationsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_locations', function(Blueprint $table)
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
			$table->string('references');
			$table->string('latitude');
			$table->string('lenght');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
		Schema::drop('client_locations');
	}

}
