@extends('layouts.admin')

@section('content')
<div id="dokumentasi-page" class="page-content p-4 lg:p-6 active">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Overview Dokumentasi</h2>
                <p class="text-gray-600">Monitor semua dokumentasi yang diupload siswa</p>
            </div>

            <!-- Filters -->
            <div class="bg-white p-6 rounded-xl shadow-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Semua Kelas</option>
                            <option>XII IPA 1</option>
                            <option>XI IPS 2</option>\
                            <option>X MIPA 3</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Semua Status</option>
                            <option>Approved</option>
                            <option>Pending</option>
                            <option>Rejected</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="w-full bg-blue-600 text-white p-3 rounded-lg hover:bg-blue-700 transition-colors">
                            <i class="fas fa-search mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Documentation Table -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Preview</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Keterangan</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XII IPA 1</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-seedling mr-1"></i>Siraman
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Jan 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="https://via.placeholder.com/60x40" alt="Preview" class="w-15 h-10 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">Kegiatan siraman tanaman pagi hari berjalan lancar...</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        ✅ Approved
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">X MIPA 3</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-broom mr-1"></i>Kebersihan
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">14 Jan 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <img src="https://via.placeholder.com/60x40" alt="Preview" class="w-15 h-10 object-cover rounded">
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">Pembersihan ruang kelas dan area sekitar...</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        ⏳ Pending
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-900">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection
