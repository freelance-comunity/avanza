<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientAvalsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_avals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name_aval');
			$table->string('last_name_aval');
			$table->string('mothers_name_aval');
			$table->string('birthdate_aval');
			$table->string('curp_aval');
			$table->string('phone_aval');
			$table->string('civil_status_aval');
			$table->string('scholarship_aval');			
			$table->string('street_aval');
			$table->string('number_aval');
			$table->string('colony_aval');
			$table->string('municipality_aval');
			$table->string('state_aval');
			$table->string('postal_code_aval');
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
		Schema::drop('client_avals');
	}

}
