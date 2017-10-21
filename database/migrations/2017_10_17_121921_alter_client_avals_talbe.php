<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterClientAvalsTalbe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_avals', function (Blueprint $table) {
         $table->string('photo_ine')->after('postal_code_aval');
         $table->string('photo_curp')->after('photo_ine');
         $table->string('photo_cd')->after('photo_curp');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_avals', function (Blueprint $table) {
           $table->dropColumn('photo_ine');
           $table->dropColumn('photo_curp');
           $table->dropColumn('photo_cd');
       });
    }
}
