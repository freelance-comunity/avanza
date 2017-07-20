<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('folio');
			$table->string('firts_name');
			$table->string('last_name');
			$table->string('mothers_last_name');
			$table->string('curp');
			$table->string('ine');			
			$table->string('civil_status');
			$table->string('scholarship');
			$table->string('phone');		
			$table->string('no_economic_dependent');
			$table->string('no_familys');
			$table->string('type_of_housing');
			$table->string('avatar');
			$table->integer('branch_id')->unsigned();
			$table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
		Schema::drop('clients');
	}

}
