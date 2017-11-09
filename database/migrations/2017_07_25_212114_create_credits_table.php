<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCreditsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('credits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('adviser');
			$table->string('date');
			$table->string('folio');
			$table->string('branch');
			$table->string('ammount');
			$table->string('interest_rate');
			$table->string('dues');			
			$table->string('periodicity');
			$table->string('warranty_type');
			$table->string('firts_name');
			$table->string('last_name');
			$table->string('mothers_last_name');
			$table->string('curp');
			$table->string('ine');
			$table->string('civil_status');
			$table->string('phone');
			$table->string('dependents');
			$table->string('type_of_housing');
			$table->string('street');
			$table->string('number');
			$table->string('colony');
			$table->string('municipality');
			$table->string('state');
			$table->string('postal_code');			
			$table->string('references');
			$table->string('street_company');
			$table->string('number_company');
			$table->string('colony_company');
			$table->string('municipality_company');
			$table->string('state_company');
			$table->string('postal_code_company');
			$table->string('phone_company');
			$table->string('name_company');
			$table->string('name_aval');
			$table->string('last_name_aval');
			$table->string('mothers_name_aval');
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
			$table->string('collection_period');
			$table->string('firm');
			$table->string('status');
			$table->integer('client_id')->unsigned();
			$table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
			$table->integer('branch_id')->unsigned();
			$table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
			$table->integer('region_id')->unsigned();
			$table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
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
		Schema::drop('credits');
	}

}
