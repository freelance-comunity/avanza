<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBoxCutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('box_cuts', function (Blueprint $table) {
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
        Schema::table('box_cuts', function (Blueprint $table) {
           $table->dropForeign('box_cuts_branch_id_foreign');
           $table->dropForeign('box-cuts_region_id_foreign');
       });
    }
}
