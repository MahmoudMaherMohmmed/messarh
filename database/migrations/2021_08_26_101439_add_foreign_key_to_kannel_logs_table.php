<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToKannelLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kannel_logs', function (Blueprint $table) {
            $table->foreign('kannel_id')->references('id')->on('kannels')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kannel_logs', function (Blueprint $table) {
            $table->dropForeign('kannel_logs_kannel_id_foreign');
        });
    }
}
