<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simulasi extends Model
{
    protected $fillable = [
        'materi_id',
        'judul',
        'slug',
        'deskripsi',
        'skenario',
    ];

    protected $casts = [
        'skenario' => 'array',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}