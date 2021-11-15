<?php

use App\Models\Kannel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertExcelLinkToKannelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $orange = Kannel::where('title', 'Orange')->first();
        if (isset($orange) && $orange != null) {
            $orange->excel_link = 'https://ivasz-my.sharepoint.com/:x:/r/personal/abdelaziz_hassan_ivas_com_eg/_layouts/15/Doc.aspx?sourcedoc=%7BB72AEC3B-8837-4F85-BD20-D90028491DBB%7D&file=Book%205.xlsx&action=editnew&mobileredirect=true&wdNewAndOpenCt=1623074053031&ct=1623074053031&wdPreviousSession=6aceada3-7338-47e5-b851-adab01a26fe6&wdOrigin=OFFICECOM-WEB.START.NEW&cid=e149afaa-8a1b-4bc9-82cf-b0eef03e55ff';
            $orange->save();
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
