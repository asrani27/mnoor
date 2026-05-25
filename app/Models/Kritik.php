<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kritik extends Model
{
    protected $fillable = ['layanan_id', 'responden_id', 'isi_kritik', 'tindak_lanjut'];

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class);
    }

    public function responden(): BelongsTo
    {
        return $this->belongsTo(Responden::class);
    }
}
