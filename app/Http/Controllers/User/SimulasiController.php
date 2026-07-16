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
        $simulasis = Simulasi::with('materi')->latest()->get();
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
