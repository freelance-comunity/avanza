<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeecredentialsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('employeecredentials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('ine');
			$table->string('curp');
			$table->string('rfc');
			$table->string('passport');
			$table->string('number_imss');
			$table->string('driver_license');
			$table->string('professional_id');
			$table->integer('user_id')->unsigned()->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('employeecredentials');
	}

}
