<?php
namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = JadwalKegiatan::with('kelas')->latest()->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        return view('jadwal.create', compact('kelas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kategori' => 'required|string',
            'kelas_id' => 'required|exists:kelas,id',
            'lokasi' => 'nullable|string',
            'link_drive' => 'nullable|url',
        ]);

        JadwalKegiatan::create($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show(JadwalKegiatan $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    public function edit(JadwalKegiatan $jadwal)
    {
        $kelas = Kelas::all();
        return view('jadwal.edit', compact('jadwal', 'kelas'));
    }

    public function update(Request $request, JadwalKegiatan $jadwal)
    {
        $jadwal->update($request->all());
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy(JadwalKegiatan $jadwal)
    {
        $jadwal->delete();
        return back()->with('success', 'Jadwal berhasil dihapus');
    }
}
