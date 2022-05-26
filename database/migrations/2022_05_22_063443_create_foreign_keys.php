<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('toppings', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('sizes', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_category')->references('id')->on('categories');
        });

        Schema::table('bill_detail_toppings', function (Blueprint $table) {
            $table->foreign('id_topping')->references('id')->on('toppings');
            $table->foreign('id_bill_detail')->references('id')->on('bill_details');
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
        });

        Schema::table('user_discounts', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_discount')->references('id')->on('discounts');
        });

        Schema::table('bills', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_address')->references('id')->on('addresses');
            $table->foreign('id_discount')->references('id')->on('discounts');
        });

        Schema::table('bill_details', function (Blueprint $table) {
            $table->foreign('id_bill')->references('id')->on('bills');
            $table->foreign('id_size')->references('id')->on('sizes');
            $table->foreign('id_product')->references('id')->on('products');
        });

       

        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_table')->references('id')->on('tables');
        });
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
