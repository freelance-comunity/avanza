<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('clients', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('folio');
			$table->string('firts_name');
			$table->string('last_name');
			$table->string('mothers_last_name');
			$table->string('birthdate');
			$table->string('birth_entity');
			$table->string('gender');
			$table->string('civil_status');
			$table->string('country');
			$table->string('nationality');
			$table->string('scholarship');
			$table->string('phone_one');
			$table->string('phone_two');
			$table->string('no_children');
			$table->string('no_economic_dependent');
			$table->string('avatar');
			$table->integer('branch_id')->unsigned()->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
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
		Schema::drop('clients');
	}

}
