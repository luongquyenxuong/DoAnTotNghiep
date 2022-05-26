<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailToppingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_detail_toppings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_topping');
            $table->unsignedBigInteger('id_bill_detail');
            //$table->interger('amount');
            $table->decimal('price',10,2);
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_detail_toppings');
    }
}
