<?php

use App\Models\Kannel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertNewDataToKannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $kannels = [
            ["title" => "Idex", "url" => "http://10.2.10.21:20000/status.xml"],
            ["title" => "DU", "url" => "http://10.2.10.12:20000/status.xml"],
            ["title" => "Zain Kuwait", "url" => "http://10.2.10.10:20000/status.xml"],
        ];
        foreach ($kannels as  $kannel) {
            Kannel::create([
                "title" => $kannel['title'],
                "url" => $kannel['url']
            ]);
        }
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
