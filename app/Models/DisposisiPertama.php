<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DisposisiPertama extends Model
{
    use HasFactory;

    protected $table = 'disposisi_pertamas';

    protected $fillable = [
        'surat_masuk_id',
        'jenis_disposisi',
        'divisi_id',
        'catatan',
    ];

    public function SuratMasuk(): BelongsTo
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function Divisi(): BelongsTo
    {
        return $this->belongsTo(Divisi::class);
    }
}
