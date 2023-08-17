<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    use HasFactory;

    public function JenisDisposisi()
    {
        return $this->belongsTo(JenisDisposisi::class);
    }

    public function SuratMasuk()
    {
        return $this->belongsTo(SuratMasuk::class);
    }
}
