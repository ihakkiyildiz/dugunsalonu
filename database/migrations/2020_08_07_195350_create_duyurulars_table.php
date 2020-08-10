<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuyurularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('duyurular', function (Blueprint $table) {
            $table->id();
            $table->string('seourl')->unique();
            $table->string('duyurutitle');
            $table->string('metaicerik');
            $table->text('icerik');
            $table->string('keyword');
            $table->string('image');
            $table->boolean('durum')->default(1);
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
        Schema::dropIfExists('duyurular');
    }
}
