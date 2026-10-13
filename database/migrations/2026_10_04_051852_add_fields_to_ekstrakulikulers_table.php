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
        Schema::table('ekstrakulikulers', function (Blueprint $table) {
            $table->string('nama_ekstrakulikuler')->after('id');
            $table->text('deskripsi')->after('nama_ekstrakulikuler');
            $table->string('gambar')->nullable()->after('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ekstrakulikulers', function (Blueprint $table) {
            $table->dropColumn([
                'nama_ekstrakulikuler',
                'deskripsi',
                'gambar',
            ]);
        });
    }
};