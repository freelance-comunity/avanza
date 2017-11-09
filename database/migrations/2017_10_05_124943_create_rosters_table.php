<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rosters', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('date');
			$table->string('coordinating_name');
			$table->string('coordination');
			$table->string('branch_office');
			$table->string('name_employee');
			$table->string('number_employee');
			$table->string('position');
			$table->string('payment_scheme');
			$table->string('payment_period');
			$table->string('perceptions');
			$table->string('deductions');
			$table->string('grandchild_pay');
			$table->string('coordinating_firm');
			$table->string('employee_firm');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('rosters');
	}

}
