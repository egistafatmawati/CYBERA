<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Materi;

class SimulasiController extends Controller
{
    public function index()
    {
        $simulasis = Simulasi::latest()->get();

        return view('admin.simulasi.index', compact('simulasis'));
    }

    public function create()
    {
         $materis = Materi::all();

        return view('admin.simulasi.create', compact('materis'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'materi_id' => 'required|exists:materis,id',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
    ]);

        Simulasi::create([
            'materi_id' => $request->materi_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,

            'skenario_1' => $request->skenario_1,
            'pertanyaan_1' => $request->pertanyaan_1,
            'tipe_1' => $request->tipe_1,
            'opsi_a_1' => $request->opsi_a_1,
            'opsi_b_1' => $request->opsi_b_1,
            'opsi_c_1' => $request->opsi_c_1,
            'opsi_d_1' => $request->opsi_d_1,
            'jawaban_1' => $request->jawaban_1,
            'penjelasan_1' => $request->penjelasan_1,

            'skenario_2' => $request->skenario_2,
            'pertanyaan_2' => $request->pertanyaan_2,
            'tipe_2' => $request->tipe_2,
            'opsi_a_2' => $request->opsi_a_2,
            'opsi_b_2' => $request->opsi_b_2,
            'opsi_c_2' => $request->opsi_c_2,
            'opsi_d_2' => $request->opsi_d_2,
            'jawaban_2' => $request->jawaban_2,
            'penjelasan_2' => $request->penjelasan_2,

            'skenario_3' => $request->skenario_3,
            'pertanyaan_3' => $request->pertanyaan_3,
            'tipe_3' => $request->tipe_3,
            'opsi_a_3' => $request->opsi_a_3,
            'opsi_b_3' => $request->opsi_b_3,
            'opsi_c_3' => $request->opsi_c_3,
            'opsi_d_3' => $request->opsi_d_3,
            'jawaban_3' => $request->jawaban_3,
            'penjelasan_3' => $request->penjelasan_3,
    ]);

        return redirect()
            ->route('admin.simulasi.index')
            ->with('success', 'Simulasi berhasil ditambahkan.');
    }

    public function show(Simulasi $simulasi)
    {
        return view('admin.simulasi.show', compact('simulasi'));
    }

    public function edit(Simulasi $simulasi)
    {
        $materis = Materi::all();

        return view('admin.simulasi.edit', compact('simulasi', 'materis'));
    }

    public function update(Request $request, Simulasi $simulasi)
    {
        $request->validate([
        'materi_id' => 'required|exists:materis,id',
        'judul' => 'required|string|max:255',
        'deskripsi' => 'required',
    ]);

        $simulasi->update([
            'materi_id' => $request->materi_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,

            'skenario_1' => $request->skenario_1,
            'pertanyaan_1' => $request->pertanyaan_1,
            'tipe_1' => $request->tipe_1,
            'opsi_a_1' => $request->opsi_a_1,
            'opsi_b_1' => $request->opsi_b_1,
            'opsi_c_1' => $request->opsi_c_1,
            'opsi_d_1' => $request->opsi_d_1,
            'jawaban_1' => $request->jawaban_1,
            'penjelasan_1' => $request->penjelasan_1,

            'skenario_2' => $request->skenario_2,
            'pertanyaan_2' => $request->pertanyaan_2,
            'tipe_2' => $request->tipe_2,
            'opsi_a_2' => $request->opsi_a_2,
            'opsi_b_2' => $request->opsi_b_2,
            'opsi_c_2' => $request->opsi_c_2,
            'opsi_d_2' => $request->opsi_d_2,
            'jawaban_2' => $request->jawaban_2,
            'penjelasan_2' => $request->penjelasan_2,

            'skenario_3' => $request->skenario_3,
            'pertanyaan_3' => $request->pertanyaan_3,
            'tipe_3' => $request->tipe_3,
            'opsi_a_3' => $request->opsi_a_3,
            'opsi_b_3' => $request->opsi_b_3,
            'opsi_c_3' => $request->opsi_c_3,
            'opsi_d_3' => $request->opsi_d_3,
            'jawaban_3' => $request->jawaban_3,
            'penjelasan_3' => $request->penjelasan_3,
    ]);

        return redirect()
            ->route('admin.simulasi.index')
            ->with('success', 'Simulasi berhasil diperbarui.');
    }

    public function destroy(Simulasi $simulasi)
    {
        $simulasi->delete();

        return redirect()
            ->route('admin.simulasi.index')
            ->with('success', 'Simulasi berhasil dihapus.');
    }
}