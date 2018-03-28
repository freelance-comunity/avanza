<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinalsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('finals', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('date');
			$table->string('region');
			$table->string('branch');
			$table->string('name');
			$table->string('vault');
			$table->string('incomes');
			$table->string('incomePayment');
			$table->string('access');
			$table->string('credit');
			$table->string('expenditures');
			$table->string('actives');
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
		Schema::drop('finals');
	}

}
