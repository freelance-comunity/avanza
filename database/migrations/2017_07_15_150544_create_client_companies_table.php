<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientCompaniesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('street_company');
			$table->string('number_company');
			$table->string('colony_company');
			$table->string('municipality_company');
			$table->string('state_company');
			$table->string('postal_code_company');	
			$table->string('phone_company');
			$table->string('name_company');
			$table->string('inventory');	
			$table->string('machinery_equipment');
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
			$table->string('latitude_company');
			$table->string('length_company');
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
		Schema::drop('client_companies');
	}

}
