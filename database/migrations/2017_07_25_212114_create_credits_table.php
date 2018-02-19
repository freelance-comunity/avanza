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
			$table->string('firts_name');
			$table->string('last_name');
			$table->string('mothers_last_name');
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
