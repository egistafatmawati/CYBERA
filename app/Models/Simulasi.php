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

        'skenario_1',
        'pertanyaan_1',
        'tipe_1',
        'opsi_a_1',
        'opsi_b_1',
        'opsi_c_1',
        'opsi_d_1',
        'jawaban_1',
        'penjelasan_1',

        'skenario_2',
        'pertanyaan_2',
        'tipe_2',
        'opsi_a_2',
        'opsi_b_2',
        'opsi_c_2',
        'opsi_d_2',
        'jawaban_2',
        'penjelasan_2',

        'skenario_3',
        'pertanyaan_3',
        'tipe_3',
        'opsi_a_3',
        'opsi_b_3',
        'opsi_c_3',
        'opsi_d_3',
        'jawaban_3',
        'penjelasan_3',
    ];

    public function materi()
    {
        return $this->belongsTo(Materi::class);
    }
}