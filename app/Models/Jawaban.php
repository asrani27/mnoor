<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jawaban extends Model
{
    protected $fillable = ['pertanyaan_id', 'responden_id', 'jawaban'];

    public function pertanyaan(): BelongsTo
    {
        return $this->belongsTo(Pertanyaan::class);
    }

    public function responden(): BelongsTo
    {
        return $this->belongsTo(Responden::class);
    }
}
