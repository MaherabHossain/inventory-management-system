<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParchaseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parchase_items', function (Blueprint $table) {
            $table->id();
             $table->foreignId('product_id');
            $table->foreignId('parchase_invoice_id');
            $table->double('quantity');
            $table->double('price');
            $table->double('totla');
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
        Schema::dropIfExists('parchase_items');
    }
}
