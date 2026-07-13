<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::where('role', 'user')->latest()->get();
        return view('admin.pengguna', compact('penggunas'));
    }
}
