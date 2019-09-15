<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddingConfirmAndDeliverColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('place_orders', function (Blueprint $table) {
            $table->boolean('confirm');
            $table->boolean('deliver');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('place_orders', function (Blueprint $table) {
            $table->dropColumn('confirm');
            $table->dropColumn('deliver');

        });
    }
}
