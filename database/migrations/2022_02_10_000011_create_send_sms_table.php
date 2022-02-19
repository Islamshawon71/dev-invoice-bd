<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSendSmsTable extends Migration
{
    public function up()
    {
        Schema::create('send_sms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_number');
            $table->string('sms_content');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
