<?php

use App\Models\Setting;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertEmailsToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Setting::create([
            "key" => 'emails',
           // "value" => 'emad@ivas.com.eg,dalia.soliman@ivas.com.eg,sayed@ivas.com.eg,IT@ivas.com.eg,sherif.mohamed@ivas.com.eg,ahmed.khattab@ivas.com.eg',
            "value" => 'emad@ivas.com.eg',
            "type_id" => 2,
            "order" => 0
        ]);
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
