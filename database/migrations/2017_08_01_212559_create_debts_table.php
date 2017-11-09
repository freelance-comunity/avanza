<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('debts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ammount');
			$table->string('status');
			$table->integer('credit_id')->unsigned();
			$table->foreign('credit_id')->references('id')->on('credits')->onDelete('cascade');
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
		Schema::drop('debts');
	}

}
