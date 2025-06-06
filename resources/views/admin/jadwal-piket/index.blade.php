@extends('layouts.admin')

@section('content')
<div id="jadwal-page" class="page-content p-4 lg:p-6 active">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Jadwal Piket</h2>
                    <p class="text-gray-600">Kelola jadwal kegiatan lingkungan sekolah</p>
                </div>
                <a href="{{ route('jadwal-piket.create', ['showModal' => true]) }}" 
                class="mt-4 lg:mt-0 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i>Tambah Jadwal
                </a>
                </div>

    

    <!-- Filters (optional, belum terhubung logicnya) -->
    <div class="bg-white p-6 rounded-xl shadow-lg mb-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                <input type="date" class="w-full p-3 border border-gray-300 rounded-lg">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                <select class="w-full p-3 border border-gray-300 rounded-lg">
                    <option>Semua Kategori</option>
                    <option>Siraman</option>
                    <option>Cek Kebersihan</option>
                    <option>Buang Sampah</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select class="w-full p-3 border border-gray-300 rounded-lg">
                    <option>Semua Status</option>
                    <option>Sudah</option>
                    <option>Belum</option>
                </select>
            </div>
            <div class="flex items-end">
                <button class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-search mr-2"></i>Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Tabel Jadwal -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Kategori</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Kelas</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Lokasi</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Dokumentasi</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jadwals as $jadwal)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($jadwal->tanggal)->format('d M Y') }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $jadwal->kategori == 'siraman' ? 'bg-green-100 text-green-800' : 
                                ($jadwal->kategori == 'buang_sampah' ? 'bg-red-100 text-red-800' : 
                                ($jadwal->kategori == 'cek_kebersihan' ? 'bg-yellow-100 text-yellow-800' : '')) }}">
           
                                <i class="fas {{ $jadwal->kategori == 'siraman' ? 'fa-seedling' : 
                                ($jadwal->kategori == 'buang_sampah' ? 'fa-trash' : 
                                ($jadwal->kategori == 'cek_kebersihan' ? 'fa-broom' : '')) }} mr-1"></i>
                                    {{ ucwords(str_replace('_', ' ', $jadwal->kategori)) }}
                                </span>
                                </td>
                                    
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $jadwal->kelas->nama ?? '-' }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $jadwal->lokasi }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if ($jadwal->dokumentasi)
                                    <a href="{{ $jadwal->dokumentasi }}" class="text-blue-600 hover:underline" target="_blank">
                                        <i class="fas fa-link mr-1"></i>Link
                                    </a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                    {{ $jadwal->status == 'Sudah' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $jadwal->status == 'Sudah' ? '✅ Sudah' : '❌ Belum' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium space-x-2">
                                <a href="{{ route('jadwal-piket.edit', $jadwal->id) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('jadwal-piket.destroy', $jadwal->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            </tr>
                    @endforeach

                    @if ($jadwals->isEmpty())
                        <tr>
                            <td colspan="7" class="text-center py-6 text-gray-500">Belum ada jadwal.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
