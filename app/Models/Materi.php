<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne; 

class Materi extends Model
{
    protected $fillable = [

        'judul',

        'slug',

        'deskripsi',

        'isi',

    ];
    public function simulasi()
    {
    return $this->hasOne(Simulasi::class);
    }

    public function quiz(): HasOne
    {
    return $this->hasOne(Quiz::class);
    }

}