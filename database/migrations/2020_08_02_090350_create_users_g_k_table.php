<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersGKTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('password');
            $table->string('email');
            $table->string('token')->default('Null');
            $table->string('remember_token')->default('Null');
            $table->integer('id_tit')->default('0');
            $table->integer('exp')->default('0');
            $table->integer('lvl')->default('1');
            $table->integer('varn')->default('0');
            $table->string('avatar')->default('https://test.greenkras.ru/image/avatars/noavatar.png');
            $table->boolean('auth')->default('0');
            $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
