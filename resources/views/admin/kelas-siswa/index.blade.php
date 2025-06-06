@extends('layouts.admin')

@section('content')
<div id="kelas-page" class="page-content p-4 lg:p-6 active">
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
        <div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Kelas & Siswa</h2>
            <p class="text-gray-600">Kelola data kelas dan siswa yang terdaftar</p>
        </div>

        <a href="{{ route('kelas-siswa.create', ['showModal' => true]) }}" 
   class="mt-4 lg:mt-0 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
    <i class="fas fa-plus mr-2"></i>Tambah Siswa Baru
</a>
    </div>

    <!-- Classes Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach ($kelasList as $kelas)
            <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-xl font-bold text-gray-800">{{ $kelas->nama }}</h3>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                </div>
                <div class="space-y-3 mb-4">
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Total Siswa:</span>
                        <span class="font-semibold">{{ $kelas->users_count }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Tugas Selesai:</span>
                        <span class="font-semibold text-green-600">-</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-600">Tingkat Kepatuhan:</span>
                        <span class="font-semibold text-blue-600">-</span>
                    </div>
                </div>
                <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-users mr-2"></i>Lihat Siswa
                </button>
            </div>
        @endforeach
    </div>

    <!-- Students Table -->
    <div class="bg-white rounded-xl shadow-lg mt-8 overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-gray-800">Daftar Siswa</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="table-hover">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $user->kelas->nama ?? '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Aktif
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                <a href="{{ route('kelas-siswa.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                            <form action="{{ route('kelas-siswa.destroy', $user->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus siswa ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
