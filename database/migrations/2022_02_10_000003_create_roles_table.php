<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->longText('features')->nullable();
            $table->string('validity')->nullable();
            $table->integer('products_limit')->nullable();
            $table->integer('shop_limit')->nullable();
            $table->integer('customers_limit')->nullable();
            $table->integer('orders_limit')->nullable();
            $table->string('stock_management')->nullable();
            $table->string('new_courier_add')->nullable();
            $table->timestamps();
        });
    }
}
