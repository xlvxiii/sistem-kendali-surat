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
            $table->string('nomor_agenda');
            $table->string('file');
            $table->foreignId('jenis_disposisi_id');
            $table->string('kabag_tujuan');
            $table->string('staff_tujuan');
            $table->timestamp('tgl_diposisi_pimpinan');
            $table->timestamp('tgl_diposisi_kabag');
            $table->text('catatan');
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
