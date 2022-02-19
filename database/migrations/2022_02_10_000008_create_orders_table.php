<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number')->unique();
            $table->integer('delivery_charge')->nullable();
            $table->integer('total_bill')->nullable();
            $table->integer('discount')->nullable();
            $table->string('status')->nullable();
            $table->string('courier_tracking_number')->nullable();
            $table->timestamps();
        });
    }
}
