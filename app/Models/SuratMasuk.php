<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tanggal_diterima',
        'perihal',
        'asal_surat',
        'nomor_agenda',
        'file',
        'jenis_disposisi_id',
        'kabag_tujuan',
        'staff_tujuan',
        'tanggal_disposisi_pimpinan',
        'tanggal_disposisi_kabag',
        'catatan',
    ];

    public function JenisDisposisi(): BelongsTo
    {
        return $this->belongsTo(JenisDisposisi::class);
    }
}
