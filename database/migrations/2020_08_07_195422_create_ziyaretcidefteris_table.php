<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZiyaretcidefterisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ziyaretcidefteri', function (Blueprint $table) {
            $table->id();
            $table->string('adsoyad');
            $table->string('email');
            $table->text('mesaj');
            $table->boolean('durum')->default(0);
            $table->dateTime('okundu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ziyaretcidefteri');
    }
}
