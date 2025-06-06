@extends('layouts.admin')

@section('content')


    <!-- Main Content -->
    
        <!-- Dashboard Page -->
        <div id="dashboard-page" class="page-content p-4 lg:p-6">
            <!-- Header -->
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard Admin</h2>
                <p class="text-gray-600" id="current-date"></p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Total Jadwal Hari Ini</p>
                            <p class="text-3xl font-bold text-gray-800">15</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-calendar-day text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Dokumentasi Masuk</p>
                            <p class="text-3xl font-bold text-green-600">12</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Belum Submit</p>
                            <p class="text-3xl font-bold text-red-600">3</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm font-medium">Tingkat Kepatuhan</p>
                            <p class="text-3xl font-bold text-blue-600">80%</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-chart-pie text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Task Summary -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Siraman Tanaman</h3>
                        <i class="fas fa-seedling text-green-600 text-2xl"></i>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Jadwal:</span>
                            <span class="font-semibold">6</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selesai:</span>
                            <span class="font-semibold text-green-600">5</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pending:</span>
                            <span class="font-semibold text-red-600">1</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Cek Kebersihan</h3>
                        <i class="fas fa-broom text-blue-600 text-2xl"></i>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Jadwal:</span>
                            <span class="font-semibold">5</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selesai:</span>
                            <span class="font-semibold text-green-600">4</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pending:</span>
                            <span class="font-semibold text-red-600">1</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">Buang Sampah</h3>
                        <i class="fas fa-trash text-red-600 text-2xl"></i>
                    </div>
                    <div class="space-y-2">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Total Jadwal:</span>
                            <span class="font-semibold">4</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Selesai:</span>
                            <span class="font-semibold text-green-600">3</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Pending:</span>
                            <span class="font-semibold text-red-600">1</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Classes Not Submitted -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Kelas Belum Submit Dokumentasi</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border-l-4 border-red-500">
                        <div>
                            <p class="font-semibold text-gray-800">XI IPS 2 - Buang Sampah</p>
                            <p class="text-sm text-gray-600">Lokasi: Area Kantin | Deadline: 16:00</p>
                        </div>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ❌ Belum
                        </span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border-l-4 border-red-500">
                        <div>
                            <p class="font-semibold text-gray-800">X MIPA 1 - Cek Kebersihan</p>
                            <p class="text-sm text-gray-600">Lokasi: Ruang Kelas | Deadline: 15:30</p>
                        </div>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ❌ Belum
                        </span>
                    </div>
                    <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border-l-4 border-red-500">
                        <div>
                            <p class="font-semibold text-gray-800">XII IPA 3 - Siraman Tanaman</p>
                            <p class="text-sm text-gray-600">Lokasi: Taman Belakang | Deadline: 07:30</p>
                        </div>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ❌ Belum
                        </span>
                    </div>
                </div>
            </div>
        </div>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

    <!-- Modals -->
    <!-- Add Schedule Modal -->
    <div id="jadwal-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center">
        <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Jadwal Piket</h3>
                <button onclick="closeModal('jadwal-modal')" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                    <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Pilih kategori...</option>
                        <option>Siraman</option>
                        <option>Cek Kebersihan</option>
                        <option>Buang Sampah</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Pilih kelas...</option>
                        <option>XII IPA 1</option>
                        <option>XI IPS 2</option>
                        <option>X MIPA 3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan lokasi tugas">
                </div>
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="closeModal('jadwal-modal')" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div id="student-modal" class="modal fixed inset-0 bg-black bg-opacity-50 z-50 items-center justify-center">
        <div class="bg-white rounded-xl p-6 w-full max-w-md mx-4">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-800">Tambah Siswa</h3>
                <button onclick="closeModal('student-modal')" class="text-gray-400 hover:text-gray-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan nama lengkap">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Masukkan email">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Pilih kelas...</option>
                        <option>XII IPA 1</option>
                        <option>XI IPS 2</option>
                        <option>X MIPA 3</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                    <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option>Siswa</option>
                        <option>Admin</option>
                    </select>
                </div>
                <div class="flex space-x-3 pt-4">
                    <button type="button" onclick="closeModal('student-modal')" class="flex-1 bg-gray-300 text-gray-700 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection