<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('father_last_name');
            $table->string('mother_last_name');  
            $table->date('birthdate');
            $table->string('birth_entity');
            $table->string('place_of_birth');
            $table->string('gender');
            $table->string('civil_status');
            $table->string('country_of_birth');
            $table->string('nationality');
            $table->string('scholarship');
            $table->string('phone_1');
            $table->string('phone_2');
            $table->string('avatar');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('branch_id')->unsigned()->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
