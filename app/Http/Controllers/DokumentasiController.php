<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use App\Models\JadwalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::where('user_id', Auth::id())->get();
        return view('dokumentasi.index', compact('dokumentasi'));
    }

    public function create()
    {
        $jadwals = JadwalKegiatan::where('kelas_id', Auth::user()->kelas_id)->get();
        return view('dokumentasi.create', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jadwal_id' => 'required|exists:jadwal_kegiatan,id',
            'file_path' => 'required|file|mimes:jpg,jpeg,png,pdf,mp4|max:10240',
            'keterangan' => 'nullable|string',
        ]);

        $path = $request->file('file_path')->store('dokumentasi', 'public');

        Dokumentasi::create([
            'user_id' => Auth::id(),
            'jadwal_id' => $request->jadwal_id,
            'file_path' => $path,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Dokumentasi berhasil diunggah');
    }
}
