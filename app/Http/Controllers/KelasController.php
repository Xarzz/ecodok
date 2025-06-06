<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KelasController extends Controller
{
    public function index(Request $request)
    {
        $kelasList = Kelas::withCount('users')->get();

        $query = User::where('role', 'siswa')->with('kelas');

        if ($request->kelas_id) {
        $query->where('kelas_id', $request->kelas_id);
        }

        $users = $query->paginate(10); // bisa ubah angka sesuai kebutuhan

        return view('admin.kelas-siswa.index', compact('kelasList', 'users'));
    }

    public function create()
    {
        $kelasList = Kelas::all();
        return view('admin.kelas-siswa.create', compact('kelasList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'kelas_id' => 'required|exists:kelas,id',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);

        return redirect()->route('kelas-siswa.index')->with('success', 'Siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
    $siswa = User::with('kelas')->findOrFail($id);
    return view('admin.kelas-siswa.show', compact('siswa'));
    }


    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        $kelasList = Kelas::all();
        return view('admin.kelas-siswa.edit', compact('siswa', 'kelasList'));
    }

    public function update(Request $request, $id)
    {
        $siswa = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $siswa->id,
            'kelas_id' => 'required|exists:kelas,id',
            'password' => 'nullable|min:6',
        ]);

        $siswa->update([
            'name' => $request->name,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id,
            'password' => $request->password ? Hash::make($request->password) : $siswa->password,
        ]);

        return redirect()->route('kelas-siswa.index')->with('success', 'Siswa berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $siswa = User::findOrFail($id);
        $siswa->delete();

        return back()->with('success', 'Jadwal berhasil dihapus');
    }

}

