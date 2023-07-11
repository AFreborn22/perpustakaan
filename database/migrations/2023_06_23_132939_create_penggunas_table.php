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
        Schema::create('penggunas', function (Blueprint $table) {
            $table->unsignedBigInteger('NIM')->primary();
            $table->string('Nama');
            $table->string('Username');
            $table->string('Password');
            $table->string('email');
        });
        Schema::table('penggunas', function (Blueprint $table) {
            //
            $table->string('Password', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
        Schema::table('penggunas', function (Blueprint $table) {
            //
            $table->string('Password', 60)->change();
        });
    }

};
