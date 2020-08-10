<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHizmetlersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hizmetler', function (Blueprint $table) {
            $table->id();
            $table->string('seourl')->unique();
            $table->string('sayfatitle');
            $table->string('metaicerik');
            $table->text('icerik');
            $table->string('keyword');
            $table->string('image');
            $table->integer('sira');
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
        Schema::dropIfExists('hizmetler');
    }
}
