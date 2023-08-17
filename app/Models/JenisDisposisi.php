<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisDisposisi extends Model
{
    use HasFactory;

    public function disposisi()
    {
        return $this->hasMany(Disposisi::class);
    }
}
