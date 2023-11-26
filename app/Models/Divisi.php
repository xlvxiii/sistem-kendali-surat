<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Divisi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

    public function User(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function DisposisiPertama(): HasMany
    {
        return $this->hasMany(DisposisiPertama::class);
    }
}
