<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKegiatan;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $jadwals = JadwalKegiatan::with('kelas')->orderBy('tanggal', 'desc')->get();
            return view('admin.dashboard.index', compact('jadwals'));
        }

        // Role siswa
        $jadwals = JadwalKegiatan::where('kelas_id', $user->kelas_id)->orderBy('tanggal', 'desc')->get();
        $dokumentasi = Dokumentasi::where('user_id', $user->id)->get();

        return view('dashboard.siswa', compact('jadwals', 'dokumentasi'));
    }
}
