<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiwiyata - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #1e40af 0%, #3730a3 100%);
        }
        
        .table-hover:hover {
            background-color: #f8fafc;
        }
        
        .status-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .modal {
            display: none;
        }
        
        .modal.active {
            display: flex;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden fixed top-4 left-4 z-50 bg-white p-3 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-600"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl z-40 sidebar-transition transform -translate-x-full lg:translate-x-0">
        <!-- Header -->
        <div class="p-6 gradient-bg text-white">
            <div class="flex items-center space-x-3">
                <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                    <i class="fas fa-leaf text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-xl font-bold">Adiwiyata</h1>
                    <p class="text-sm opacity-90">Admin Dashboard</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-6">
            <a href="#" onclick="showPage('dashboard')" class="nav-item active flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 border-r-4 border-transparent hover:border-blue-500 transition-all">
                <i class="fas fa-chart-line mr-3 text-lg"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            <a href="#" onclick="showPage('jadwal')" class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-green-50 hover:text-green-600 border-r-4 border-transparent hover:border-green-500 transition-all">
                <i class="fas fa-calendar-alt mr-3 text-lg"></i>
                <span class="font-medium">Jadwal Piket</span>
            </a>
            <a href="#" onclick="showPage('dokumentasi')" class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-purple-50 hover:text-purple-600 border-r-4 border-transparent hover:border-purple-500 transition-all">
                <i class="fas fa-folder-open mr-3 text-lg"></i>
                <span class="font-medium">Dokumentasi</span>
            </a>
            <a href="#" onclick="showPage('kelas')" class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-orange-50 hover:text-orange-600 border-r-4 border-transparent hover:border-orange-500 transition-all">
                <i class="fas fa-users mr-3 text-lg"></i>
                <span class="font-medium">Kelas & Siswa</span>
            </a>
            <div class="mt-8 px-6">
                <hr class="border-gray-200">
            </div>

            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-red-50 hover:text-red-600 border-r-4 border-transparent hover:border-red-500 transition-all">
                <i class="fas fa-sign-out-alt mr-3 text-lg"></i>
                <span class="font-medium">Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
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

        <!-- Jadwal Piket Page -->
        <div id="jadwal-page" class="page-content p-4 lg:p-6 hidden">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Jadwal Piket</h2>
                    <p class="text-gray-600">Kelola jadwal kegiatan lingkungan sekolah</p>
                </div>
                <button onclick="openModal('jadwal-modal')" class="mt-4 lg:mt-0 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-plus mr-2"></i>Tambah Jadwal
                </button>
            </div>

            <!-- Filters -->
            <div class="bg-white p-6 rounded-xl shadow-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <input type="date" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option>Semua Kategori</option>
                            <option>Siraman</option>
                            <option>Cek Kebersihan</option>
                            <option>Buang Sampah</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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

            <!-- Schedule Table -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kategori</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Lokasi</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Dokumentasi</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Jan 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-seedling mr-1"></i>Siraman
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XII IPA 1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Taman Depan</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600">
                                    <a href="#" class="hover:underline">
                                        <i class="fas fa-link mr-1"></i>Link Drive
                                    </a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        ✅ Sudah
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">15 Jan 2024</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-trash mr-1"></i>Buang Sampah
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XI IPS 2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Area Kantin</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-400">-</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        ❌ Belum
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Dokumentasi Page -->
        <div id="dokumentasi-page" class="page-content p-4 lg:p-6 hidden">
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
                            <option>XI IPS 2</option>
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

        <!-- Kelas & Siswa Page -->
        <div id="kelas-page" class="page-content p-4 lg:p-6 hidden">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between mb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Kelas & Siswa</h2>
                    <p class="text-gray-600">Kelola data kelas dan siswa yang terdaftar</p>
                </div>
                <button onclick="openModal('student-modal')" class="mt-4 lg:mt-0 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors">
                    <i class="fas fa-user-plus mr-2"></i>Tambah Siswa
                </button>
            </div>

            <!-- Classes Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
                <!-- Class Card 1 -->
                <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">XII IPA 1</h3>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                    </div>
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Total Siswa:</span>
                            <span class="font-semibold">32</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tugas Selesai:</span>
                            <span class="font-semibold text-green-600">28/30</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tingkat Kepatuhan:</span>
                            <span class="font-semibold text-blue-600">93%</span>
                        </div>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-users mr-2"></i>Lihat Siswa
                    </button>
                </div>

                <!-- Class Card 2 -->
                <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">XI IPS 2</h3>
                        <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">Perlu Perhatian</span>
                    </div>
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Total Siswa:</span>
                            <span class="font-semibold">28</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tugas Selesai:</span>
                            <span class="font-semibold text-orange-600">20/30</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tingkat Kepatuhan:</span>
                            <span class="font-semibold text-orange-600">67%</span>
                        </div>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-users mr-2"></i>Lihat Siswa
                    </button>
                </div>

                <!-- Class Card 3 -->
                <div class="bg-white rounded-xl shadow-lg p-6 card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold text-gray-800">X MIPA 3</h3>
                        <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Aktif</span>
                    </div>
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Total Siswa:</span>
                            <span class="font-semibold">30</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tugas Selesai:</span>
                            <span class="font-semibold text-green-600">27/30</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Tingkat Kepatuhan:</span>
                            <span class="font-semibold text-green-600">90%</span>
                        </div>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition-colors">
                        <i class="fas fa-users mr-2"></i>Lihat Siswa
                    </button>
                </div>
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
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-semibold">AH</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Ahmad Hidayat</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">ahmad.hidayat@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XII IPA 1</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        Siswa
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="table-hover">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-purple-600 font-semibold">SR</span>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Sari Rahayu</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">sari.rahayu@email.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">XI IPS 2</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        Admin
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                    <button class="text-blue-600 hover:text-blue-900">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-900">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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

    <script>
        // Set current date
        document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Mobile menu functionality
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        mobileMenuBtn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });

        // Page navigation
        function showPage(pageId) {
            // Hide all pages
            document.querySelectorAll('.page-content').forEach(page => {
                page.classList.add('hidden');
            });
            
            // Show selected page
            document.getElementById(pageId + '-page').classList.remove('hidden');
            
            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');
            });
            
            // Add active class to current nav item
            event.target.closest('.nav-item').classList.add('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');
            
            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // Modal functions
        function openModal(modalId) {
            document.getElementById(modalId).classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        // Initialize active nav item
        document.querySelector('.nav-item').classList.add('active', 'bg-blue-50', 'text-blue-600', 'border-blue-500');

        // Close modals when clicking outside
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>