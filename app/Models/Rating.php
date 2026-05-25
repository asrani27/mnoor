<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'responden_id',
        'layanan_id',
        'rating',
        'komentar',
    ];

    public function responden()
    {
        return $this->belongsTo(Responden::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
