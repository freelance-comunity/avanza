<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('number');
			$table->date('day');
			$table->string('date');
			$table->string('ammount');
			$table->string('capital');
			$table->string('interest');
			$table->string('moratorium');
			$table->string('total');
			$table->string('payment');
			$table->string('status');
			$table->integer('debt_id')->unsigned();
			$table->foreign('debt_id')->references('id')->on('debts')->onDelete('cascade');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('payments');
	}

}
