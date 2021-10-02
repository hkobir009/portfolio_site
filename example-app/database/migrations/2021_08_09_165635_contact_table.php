<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contact_name',100);
            $table->string('contact_email',100);
            $table->string('contact_phone',100);
            $table->string('contact_website',100)->nullable();
            $table->string('contact_massege',5000);
            $table->string('created_date')->nullable();
            $table->string('updated_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('contact');
    }
}
