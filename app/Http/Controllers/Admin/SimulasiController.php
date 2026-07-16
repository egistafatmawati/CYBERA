<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Simulasi;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SimulasiController extends Controller
{
    public function index()
    {
        $simulasis = Simulasi::with('materi')->latest()->get();
        $materis = Materi::all();

        return view('admin.simulasi', compact('simulasis', 'materis'));
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
            'deskripsi' => 'required|string',
            'skenario' => 'required|array',
        ]);

        Simulasi::create([
            'materi_id' => $request->materi_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'skenario' => $request->skenario,
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
            'deskripsi' => 'required|string',
            'skenario' => 'required|array',
        ]);

        $simulasi->update([
            'materi_id' => $request->materi_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'skenario' => $request->skenario,
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