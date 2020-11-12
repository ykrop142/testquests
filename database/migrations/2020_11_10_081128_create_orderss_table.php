<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderss', function (Blueprint $table) {
            $table->id();
            $table->integer('id_orders');
            $table->string('ids_ord');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('comment');
            $table->dateTime('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderss');
    }
}
