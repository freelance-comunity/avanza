<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBranchesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('branches', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('phone');
			$table->string('address');
			$table->string('latitude');
			$table->string('length');
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
		Schema::drop('branches');
	}

}
