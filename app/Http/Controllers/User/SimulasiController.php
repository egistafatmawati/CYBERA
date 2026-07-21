<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Materi;
use App\Models\Simulasi;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    /**
     * Tampilkan daftar semua simulasi
     */
    public function index()
    {
        $simulasis = Simulasi::with('materi')
            ->orderByRaw("
                CASE 
                    WHEN judul LIKE '%Phishing%' THEN 1 
                    WHEN judul LIKE '%Website%' THEN 2 
                    WHEN judul LIKE '%Password%' THEN 3 
                    WHEN judul LIKE '%Social%' THEN 4 
                    WHEN judul LIKE '%Malware%' THEN 5 
                    WHEN judul LIKE '%Ransomware%' THEN 6 
                    WHEN judul LIKE '%Clear Screen%' THEN 7 
                    ELSE 99 
                END ASC
            ")
            ->orderBy('id', 'asc')
            ->get();
            
        return view('user.simulasi', compact('simulasis'));
    }

    /**
     * Tampilkan detail simulasi untuk sebuah materi.
     */
    public function show(Materi $materi)
    {
        $simulasi = Simulasi::where('materi_id', $materi->id)->firstOrFail();
        return view('user.simulasi.show', compact('materi', 'simulasi'));
    }

    /**
     * Tampilkan halaman interaktif bermain simulasi.
     */
    public function play(Materi $materi)
    {
        $simulasi = Simulasi::where('materi_id', $materi->id)->firstOrFail();
        return view('user.simulasi.play', compact('materi', 'simulasi'));
    }

    /**
     * Submit jawaban simulasi.
     */
    public function submit(Request $request, Materi $materi)
    {
        // Karena data skenario berupa JSON dan divalidasi langsung di sisi client (UI),
        // Bisa langsung me-return response success.
        return response()->json([
            'message' => 'Simulasi selesai dikerjakan.'
        ]);
    }
}
