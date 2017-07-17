<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpousesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('spouses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firts_name_spouse');
			$table->string('last_name_spouse');
			$table->string('mothers_name_spouse');
			$table->string('birthdate_spouse');
			$table->string('curp_spouse');
			$table->string('phone_spouse');
			$table->string('civil_status_spouse');
			$table->string('scholarship_spouse');
			$table->string('state_spouse');
			$table->string('municipality_spouse');
			$table->string('colony_spouse');
			$table->string('street_spouse');
			$table->string('number_spouse');
			$table->string('postal_code_spouse');
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
		Schema::drop('spouses');
	}

}
