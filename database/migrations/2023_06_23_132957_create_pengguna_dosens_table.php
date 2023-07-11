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
        Schema::create('pengguna_dosens', function (Blueprint $table) {
            $table->unsignedBigInteger('NIK_dosen')->primary();
            $table->string('nama_dosen');
            $table->string('Username');
            $table->string('Password');
            $table->string('email');
        });
        Schema::table('pengguna_dosens', function (Blueprint $table) {
            //
            $table->string('Password', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna_dosens');
        Schema::table('pengguna_dosens', function (Blueprint $table) {
            //
            $table->string('Password', 60)->change();
        });
    }
};
