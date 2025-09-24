<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreferitoTable extends Migration
{
    public function up()
    {
        Schema::create('preferito', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_utente');
            $table->unsignedBigInteger('id_articolo');

            $table->foreign('id_utente')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_articolo')->references('id')->on('curiosita')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('preferito');
    }
}