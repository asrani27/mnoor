<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Layanan extends Model
{
    protected $fillable = ['kode', 'nama'];

    public function respondens(): HasMany
    {
        return $this->hasMany(Responden::class);
    }

    public function kritiks(): HasMany
    {
        return $this->hasMany(Kritik::class);
    }

    public function wilayahs(): BelongsToMany
    {
        return $this->belongsToMany(Wilayah::class, 'respondens', 'layanan_id', 'wilayah_id');
    }
}
