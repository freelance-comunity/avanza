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
			$table->float('bills_1000');
			$table->float('bills_500');
			$table->float('bills_200');
			$table->float('bills_100');
			$table->float('bills_50');
			$table->float('bills_20');
			$table->float('coin_10');
			$table->float('coin_5');
			$table->float('coin_2');
			$table->float('coin_1');
			$table->float('cents_50');
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
