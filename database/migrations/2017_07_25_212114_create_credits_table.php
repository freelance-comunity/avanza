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
			$table->string('scholarship');
			$table->string('phone');
			$table->string('dependents');
			$table->string('no_familys');
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
			$table->string('inventory');
			$table->string('maq_equi');
			$table->string('vehicles');
			$table->string('property');
			$table->string('box_benck');
			$table->string('accounts');
			$table->string('suppliers');
			$table->string('credits');
			$table->string('payments');
			$table->string('specify');
			$table->string('weekday');
			$table->string('weekend');
			$table->string('utility');
			$table->string('other_income');
			$table->string('rent');
			$table->string('salary');
			$table->string('others');
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
			$table->string('firts_name_reference');
			$table->string('last_name_reference');
			$table->string('mothers_last_name_reference');
			$table->string('phone_reference');
			$table->string('firm');
			$table->string('status');
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
		Schema::drop('credits');
	}

}
