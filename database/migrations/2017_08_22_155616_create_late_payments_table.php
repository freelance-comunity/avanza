<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLatePaymentsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('late_payments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('late_number');
			$table->string('late_ammount');
			$table->string('late_payment');
			$table->integer('payment_id')->unsigned();
			$table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
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
		Schema::drop('late_payments');
	}

}
