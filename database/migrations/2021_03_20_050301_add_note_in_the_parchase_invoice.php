<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNoteInTheParchaseInvoice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('parchase_invoices',function ( Blueprint $table ){
            $table->string('note')->nullable()->after('challan_no');
        });;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('parchase_invoices', function (Blueprint $table) {
            $table->dropColumn('note');
        });
    }
}
