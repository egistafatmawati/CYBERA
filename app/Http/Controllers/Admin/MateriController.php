<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateriController extends Controller
{
   
    public function index()
    {
        $materis = Materi::orderByRaw("
            CASE 
                WHEN judul LIKE '%Dasar Keamanan Siber%' THEN 1 
                WHEN judul LIKE '%Phishing%' THEN 2 
                WHEN judul LIKE '%Malware%' THEN 3 
                WHEN judul LIKE '%Ransomware%' THEN 4 
                WHEN judul LIKE '%Social Engineering%' THEN 5 
                WHEN judul LIKE '%Password Security%' THEN 6 
                WHEN judul LIKE '%Clear Screen%' THEN 7 
                ELSE 99 
            END ASC
        ")
        ->orderBy('id', 'asc')
        ->get();

        return view('admin.materi', compact('materis'));
    }


    public function create()
    {
        return view('admin.materi.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required',
            'deskripsi' => 'required|string',
        ]);

        Materi::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
        ]);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil ditambahkan.');
    }


    public function show(Materi $materi)
    {
        return view('admin.materi.show', compact('materi'));
    }


    public function edit(Materi $materi)
    {
        return view('admin.materi.edit', compact('materi'));
    }

 
    public function update(Request $request, Materi $materi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'isi' => 'required',
        ]);

        $materi->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'deskripsi' => $request->deskripsi,
            'isi' => $request->isi,
        ]);

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil diperbarui.');
    }


    public function destroy(Materi $materi)
    {
        $materi->delete();

        return redirect()
            ->route('admin.materi.index')
            ->with('success', 'Materi berhasil dihapus.');
    }
}