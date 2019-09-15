<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldInMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member', function (Blueprint $table) {
	    $table->renameColumn('id_user','user_id');
            $table->string('product_id')->after('id_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('member', function (Blueprint $table) {
	    $table->renameColumn('user_id','id_user');
	    $table->dropColumn('product_id');
        });
    }
}
