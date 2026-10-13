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
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('nip')->unique()->after('id');
            $table->string('nama_guru')->after('nip');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->after('nama_guru');
            $table->string('mata_pelajaran')->after('jenis_kelamin');
            $table->string('no_hp')->nullable()->after('mata_pelajaran');
            $table->text('alamat')->nullable()->after('no_hp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->dropUnique(['nip']);

            $table->dropColumn([
                'nip',
                'nama_guru',
                'jenis_kelamin',
                'mata_pelajaran',
                'no_hp',
                'alamat',
            ]);
        });
    }
};