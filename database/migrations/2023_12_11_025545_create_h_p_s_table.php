<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('h_p_s', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('merk');
            $table->integer('harga');
            $table->integer('ram');
            $table->integer('memory');
            $table->integer('sinyal');
            $table->integer('layar');
            $table->integer('processor');
            $table->integer('kamera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('h_p_s');
    }
};
