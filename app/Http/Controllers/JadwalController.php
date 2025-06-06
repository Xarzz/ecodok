<?php
namespace App\Http\Controllers;

use App\Models\JadwalKegiatan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
public function index(Request $request)
{
    $showModal = $request->query('showModal', false);
    $jadwals = JadwalKegiatan::latest()->get();

    return view('admin.jadwal-piket.index', compact('jadwals', 'showModal'));
}

    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.jadwal-piket.create', compact('kelas'));
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
        return redirect()->route('jadwal-piket.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function show(JadwalKegiatan $jadwal)
    {
        return view('admin.jadwal-piket.show', compact('jadwal'));
    }

    public function edit(JadwalKegiatan $jadwal_edit)
    {
        $jadwal = $jadwal_edit; // GANTI INI
        $kelas = Kelas::all();

        return view('admin.jadwal-piket.edit', compact('jadwal', 'kelas'));
    }

    public function update(Request $request, JadwalKegiatan $jadwal)
    {
    $request->validate([
        'tanggal' => 'required|date',
        'kategori' => 'required|string',
        'kelas_id' => 'required|exists:kelas,id',
        'lokasi' => 'nullable|string',
        'link_drive' => 'nullable|url',
    ]);

    $jadwal->update($request->all());
    return redirect()->route('jadwal-piket.index')->with('success', 'Jadwal berhasil diupdate');
    }


    public function destroy($id)
    {
         $jadwal = JadwalKegiatan::findOrFail($id); // GANTI INI
         $jadwal->delete();
         return back()->with('success', 'Jadwal berhasil dihapus');
    }
}
