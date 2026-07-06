<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SkenarioOpsi extends Model
{
    protected $fillable = ['skenario_id', 'kode', 'teks_opsi'];

    public function skenario(): BelongsTo
    {
        return $this->belongsTo(Skenario::class);
    }
}
