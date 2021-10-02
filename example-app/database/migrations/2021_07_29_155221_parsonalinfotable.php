<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Parsonalinfotable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsonalinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('birth_date');
            $table->string('nationality');
            $table->string('location');
            $table->bigInteger('phone');
            $table->string('email');
            $table->string('myself_des',1000);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('parsonalinfo');
    }
}
