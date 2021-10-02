<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SocialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('git');
            $table->string('upwork');
            $table->string('freelancer');
            $table->string('fiverr');
            $table->string('pph');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('social');
    }
}
