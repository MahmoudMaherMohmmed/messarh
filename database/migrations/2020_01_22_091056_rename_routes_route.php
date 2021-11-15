<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameRoutesRoute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::raw("UPDATE routes SET route = 'routess' WHERE routes.id = 40");
        \DB::statement("ALTER TABLE `providers` CHANGE `image` `image` VARCHAR(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL;");
        \DB::statement("ALTER TABLE `contents` CHANGE `path` `path` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL;");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
