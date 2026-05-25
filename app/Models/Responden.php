<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Responden extends Model
{
    protected $fillable = ['user_id', 'wilayah_id', 'layanan_id', 'nama', 'jkel', 'pekerjaan', 'alamat', 'telp'];

    public function wilayah(): BelongsTo
    {
        return $this->belongsTo(Wilayah::class);
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function kritiks(): HasMany
    {
        return $this->hasMany(Kritik::class);
    }

    public function jawabans(): HasMany
    {
        return $this->hasMany(Jawaban::class);
    }
}
