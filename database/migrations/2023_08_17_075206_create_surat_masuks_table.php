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
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat');
            $table->date('tanggal_surat');
            $table->date('tanggal_diterima');
            $table->string('perihal');
            $table->string('asal_surat');
            $table->string('nomor_agenda')->nullable();
            $table->string('file');
            $table->foreignId('jenis_disposisi_id')->nullable();
            $table->string('kabag_tujuan')->nullable();
            $table->string('staff_tujuan')->nullable();
            $table->timestamp('tgl_diposisi_pimpinan')->nullable();
            $table->timestamp('tgl_diposisi_kabag')->nullable();
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_masuks');
    }
};
