<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_surat',
        'tanggal_surat',
        'tanggal_kirim',
        'perihal',
        'tujuan',
        'asal_surat',
        'file',
    ];
}
