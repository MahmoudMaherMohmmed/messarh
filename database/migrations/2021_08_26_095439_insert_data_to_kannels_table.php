<?php

use App\Models\Kannel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertDataToKannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $kannels = [
            ["title" => "Orange", "url" => "http://10.2.10.25:20000/status.xml"],
            ["title" => "Etisalat", "url" => "http://10.2.10.40:20000/status.xml"],
        ];
        foreach ($kannels as  $kannel) {
            $route = Kannel::create([
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
    }
}
