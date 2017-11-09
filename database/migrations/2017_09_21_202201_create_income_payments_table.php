<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomePaymentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('income_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ammount');
			$table->string('concept');
			$table->date('date');
			$table->integer('payment_id')->unsigned();
			$table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
			$table->integer('debt_id')->unsigned();
			$table->foreign('debt_id')->references('id')->on('debts')->onDelete('cascade');
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
		Schema::drop('income_payments');
	}

}
