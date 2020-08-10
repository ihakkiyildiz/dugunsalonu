<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRezervasyonlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rezervasyonlar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('salon_id')->unsigned();
            $table->foreign('salon_id')->references('id')->on('salonlar')->onDelete('cascade');
            $table->date('tarih');
            $table->string('adsoyad');
            $table->string('telefon');
            $table->text('not');
            $table->boolean('durum')->default(0);
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
        Schema::dropIfExists('rezervasyonlar');
    }
}
