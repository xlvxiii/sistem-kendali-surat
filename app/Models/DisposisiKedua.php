<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DisposisiKedua extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_masuk_id',
        'user_id',
        'catatan',
    ];

    public function SuratMasuk(): BelongsTo
    {
        return $this->belongsTo(SuratMasuk::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
