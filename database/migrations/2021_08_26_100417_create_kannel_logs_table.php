<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKannelLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kannel_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kannel_id');
            $table->string('connection_name')->nullable();
            $table->string('ip')->nullable();
            $table->string('port')->nullable();
            $table->string('status')->nullable();
            $table->string('sent')->nullable();
            $table->string('queued')->nullable();
            $table->string('failed')->nullable();
            $table->string('throughput')->nullable();
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
        Schema::dropIfExists('kannel_logs');
    }
}
