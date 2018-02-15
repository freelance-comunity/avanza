<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterActivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('actives', function (Blueprint $table) {
           $table->integer('branch_id')->unsigned()->default(1)->after('vault_id');
           $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
           $table->integer('region_id')->unsigned()->default(1)->after('branch_id');
           $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('actives', function (Blueprint $table) {
           $table->dropForeign('actives_branch_id_foreign');
           $table->dropForeign('actives_region_id_foreign');
       });
    }
}
