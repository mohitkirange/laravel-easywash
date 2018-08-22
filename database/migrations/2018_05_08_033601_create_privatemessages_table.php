<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivatemessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privatemessages', function (Blueprint $table) {
          $table->increments('id');
          $table->timestamps();
          $table->string('name');
          $table->string('email');
          $table->string('phone');
          $table->string('subject');
          $table->string('message');
          $table->integer('user_id');
          $table->integer('service_id');
          $table->integer('sp_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privatemessages');
    }
}
