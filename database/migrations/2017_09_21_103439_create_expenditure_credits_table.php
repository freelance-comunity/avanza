<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenditureCreditsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenditure_credits', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ammount');
			$table->string('concept');
			$table->date('date');
			$table->integer('credit_id')->unsigned();
			$table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
			$table->integer('vault_id')->unsigned();
			$table->foreign('vault_id')->references('id')->on('vaults')->onDelete('cascade');
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
		Schema::drop('expenditure_credits');
	}

}
