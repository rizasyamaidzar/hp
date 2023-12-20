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
            $table->double('harga');
            $table->double('ram');
            $table->double('memory');
            $table->double('sinyal');
            $table->double('layar');
            $table->double('processor');
            $table->double('kamera');
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
