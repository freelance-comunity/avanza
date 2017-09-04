<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoxCutsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('box_cuts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('bills_1000');
			$table->string('bills_500');
			$table->string('bills_200');
			$table->string('bills_100');
			$table->string('bills_50');
			$table->string('bills_20');
			$table->string('coin_10');
			$table->string('coin_5');
			$table->string('coin_2');
			$table->string('coin_1');
			$table->string('cents_50');
			$table->integer('vault_id')->unsigned();
			$table->foreign('vault_id')->references('id')->on('vaults')->onDelete('cascade');
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
		Schema::drop('box_cuts');
	}

}
