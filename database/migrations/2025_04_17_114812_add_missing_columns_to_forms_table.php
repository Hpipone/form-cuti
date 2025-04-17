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
        Schema::table('forms', function (Blueprint $table) {
            $table->string('nik', 16)->after('id');
            $table->string('nama', 50)->after('nik');
            $table->date('tanggal')->after('nama');
            $table->string('nomor_darurat', 15)->after('tanggal');
            $table->text('alasan')->after('nomor_darurat');
            $table->integer('lama_cuti')->after('alasan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('forms', function (Blueprint $table) {
            $table->dropColumn(['nik', 'nama', 'tanggal', 'nomor_darurat', 'alasan', 'lama_cuti']);
        });
    }
};
