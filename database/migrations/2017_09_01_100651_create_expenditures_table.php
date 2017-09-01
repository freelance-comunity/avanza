<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpendituresTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('expenditures', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('ammount');
			$table->string('concept');
			$table->string('voucher');
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
		Schema::drop('expenditures');
	}

}
