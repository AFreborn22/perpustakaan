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
        Schema::create('bukus', function (Blueprint $table) {
            $table->unsignedBigInteger('ISBN')->primary();
            $table->string('Judul')->nullable(false);
            $table->string('Pengarang')->nullable(false);
            $table->string('Penerbit')->nullable(false);
            $table->integer('Tahun_Terbit')->nullable(false);
            $table->integer('Jumlah_Stok')->nullable(false);
            $table->unsignedBigInteger('NIK_Staff');
            $table->foreign('NIK_Staff')->references('NIK_Staff')->on('staffs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
