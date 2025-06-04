<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiwiyata - Dashboard Program Lingkungan</title>
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
        
        .status-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .green-gradient {
            background: linear-gradient(135deg, #4ade80 0%, #22c55e 100%);
        }
        
        .orange-gradient {
            background: linear-gradient(135deg, #fb923c 0%, #f97316 100%);
        }
        
        .blue-gradient {
            background: linear-gradient(135deg, #60a5fa 0%, #3b82f6 100%);
        }
    </style>
</head>
<body class="bg-gray-50 font-sans">
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden fixed top-4 left-4 z-50 bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-600"></i>
    </button>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed left-0 top-0 h-full w-64 bg-white shadow-xl z-40 sidebar-transition transform -translate-x-full lg:translate-x-0">
        <div class="p-6 gradient-bg text-white">
            <div class="flex items-center space-x-3">
                <i class="fas fa-leaf text-2xl"></i>
                <div>
                    <h1 class="text-xl font-bold">Adiwiyata</h1>
                    <p class="text-sm opacity-90">Program Lingkungan</p>
                </div>
            </div>
        </div>
        
        <nav class="mt-6">
            <a href="#" onclick="showPage('dashboard')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-green-50 hover:text-green-600 border-r-3 border-transparent hover:border-green-500">
                <i class="fas fa-chart-line mr-3"></i>
                Dashboard
            </a>
            <a href="#" onclick="showPage('jadwal')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 border-r-3 border-transparent hover:border-blue-500">
                <i class="fas fa-calendar-alt mr-3"></i>
                Jadwal Piket
            </a>
            <a href="#" onclick="showPage('dokumentasi')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-orange-50 hover:text-orange-600 border-r-3 border-transparent hover:border-orange-500">
                <i class="fas fa-upload mr-3"></i>
                Dokumentasi
            </a>
            <a href="#" onclick="showPage('kelas')" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-purple-50 hover:text-purple-600 border-r-3 border-transparent hover:border-purple-500">
                <i class="fas fa-users mr-3"></i>
                Kelas
            </a>
            <a href="#" class="nav-item flex items-center px-6 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 border-r-3 border-transparent hover:border-red-500">
                <i class="fas fa-sign-out-alt mr-3"></i>
                Logout
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="lg:ml-64 min-h-screen">
        <!-- Dashboard Page -->
        <div id="dashboard-page" class="page-content p-6">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Dashboard</h2>
                <p class="text-gray-600" id="current-date"></p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Total Kelas Hari Ini</p>
                            <p class="text-3xl font-bold text-gray-800">12</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-calendar text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Sudah Submit</p>
                            <p class="text-3xl font-bold text-green-600">8</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Belum Submit</p>
                            <p class="text-3xl font-bold text-red-600">4</p>
                        </div>
                        <div class="bg-red-100 p-3 rounded-full">
                            <i class="fas fa-exclamation-circle text-red-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Persentase</p>
                            <p class="text-3xl font-bold text-blue-600">67%</p>
                        </div>
                        <div class="bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-chart-pie text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Today's Schedule -->
            <div class="bg-white rounded-xl shadow-lg p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Jadwal Hari Ini</h3>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-seedling text-green-600 text-xl"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Kelas XII IPA 1 - Siraman Tanaman</p>
                                <p class="text-sm text-gray-600">Lokasi: Taman Depan</p>
                            </div>
                        </div>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ✅ Sudah
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-red-50 rounded-lg border-l-4 border-red-500">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-trash text-red-600 text-xl"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Kelas XI IPS 2 - Buang Sampah</p>
                                <p class="text-sm text-gray-600">Lokasi: Area Kantin</p>
                            </div>
                        </div>
                        <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ❌ Belum
                        </span>
                    </div>

                    <div class="flex items-center justify-between p-4 bg-green-50 rounded-lg border-l-4 border-green-500">
                        <div class="flex items-center space-x-4">
                            <i class="fas fa-broom text-green-600 text-xl"></i>
                            <div>
                                <p class="font-semibold text-gray-800">Kelas X MIPA 3 - Cek Kebersihan</p>
                                <p class="text-sm text-gray-600">Lokasi: Ruang Kelas</p>
                            </div>
                        </div>
                        <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm status-badge">
                            ✅ Sudah
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jadwal Piket Page -->
        <div id="jadwal-page" class="page-content p-6 hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Jadwal Piket</h2>
                <p class="text-gray-600">Kelola jadwal kegiatan lingkungan</p>
            </div>

            <!-- Filters -->
            <div class="bg-white p-6 rounded-xl shadow-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
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
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-15</td>
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
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-15</td>
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
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2024-01-15</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-broom mr-1"></i>Cek Kebersihan
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">X MIPA 3</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Ruang Kelas</td>
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
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Dokumentasi Page -->
        <div id="dokumentasi-page" class="page-content p-6 hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Upload Dokumentasi</h2>
                <p class="text-gray-600">Upload foto/video kegiatan lingkungan</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Upload Form -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Form Upload</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Jadwal Piket</label>
                            <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option>Pilih jadwal...</option>
                                <option>15 Jan 2024 - XII IPA 1 - Siraman Tanaman</option>
                                <option>15 Jan 2024 - XI IPS 2 - Buang Sampah</option>
                                <option>15 Jan 2024 - X MIPA 3 - Cek Kebersihan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Upload File</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-blue-400 transition-colors">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                                <p class="text-gray-600">Drag & drop file atau klik untuk browse</p>
                                <p class="text-sm text-gray-400 mt-1">Maksimal 10MB (JPG, PNG, MP4)</p>
                                <input type="file" class="hidden" accept="image/*,video/*">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Catatan Tambahan</label>
                            <textarea rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Tambahkan keterangan kegiatan..."></textarea>
                        </div>

                        <button type="submit" class="w-full bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-upload mr-2"></i>Upload Dokumentasi
                        </button>
                    </form>
                </div>

                <!-- Uploaded Documents -->
                <div class="bg-white p-6 rounded-xl shadow-lg">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Dokumentasi Terbaru</h3>
                    <div class="space-y-4">
                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/80x80" alt="Preview" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">Siraman Tanaman - XII IPA 1</h4>
                                    <p class="text-sm text-gray-600">15 Januari 2024</p>
                                    <p class="text-sm text-gray-500 mt-1">Kegiatan siraman tanaman di taman depan sekolah berjalan lancar...</p>
                                    <span class="inline-block mt-2 px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">
                                        ✅ Approved
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="border border-gray-200 rounded-lg p-4">
                            <div class="flex items-start space-x-4">
                                <img src="https://via.placeholder.com/80x80" alt="Preview" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <h4 class="font-medium text-gray-800">Cek Kebersihan - X MIPA 3</h4>
                                    <p class="text-sm text-gray-600">15 Januari 2024</p>
                                    <p class="text-sm text-gray-500 mt-1">Pengecekan kebersihan ruang kelas dan area sekitar...</p>
                                    <span class="inline-block mt-2 px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">
                                        ⏳ Pending
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Kelas Page -->
        <div id="kelas-page" class="page-content p-6 hidden">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-800 mb-2">Manajemen Kelas</h2>
                <p class="text-gray-600">Kelola data kelas dan siswa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">XII IPA 1</h3>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Aktif</span>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600"><i class="fas fa-users mr-2"></i>32 Siswa</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-check-circle mr-2"></i>8/10 Tugas Selesai</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-calendar mr-2"></i>Jadwal: Senin, Rabu</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">XI IPS 2</h3>
                        <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm">Pending</span>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600"><i class="fas fa-users mr-2"></i>28 Siswa</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-exclamation-circle mr-2"></i>5/10 Tugas Selesai</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-calendar mr-2"></i>Jadwal: Selasa, Kamis</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">X MIPA 3</h3>
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm">Aktif</span>
                    </div>
                    <div class="space-y-2">
                        <p class="text-sm text-gray-600"><i class="fas fa-users mr-2"></i>30 Siswa</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-check-circle mr-2"></i>9/10 Tugas Selesai</p>
                        <p class="text-sm text-gray-600"><i class="fas fa-calendar mr-2"></i>Jadwal: Jumat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Overlay for mobile -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-30 hidden lg:hidden"></div>

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
                item.classList.remove('bg-blue-50', 'text-blue-600', 'border-blue-500');
            });
            
            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // File upload functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[type="file"]');
            const dropZone = fileInput.parentElement;

            dropZone.addEventListener('click', () => fileInput.click());

            dropZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                dropZone.classList.add('border-blue-400', 'bg-blue-50');
            });

            dropZone.addEventListener('dragleave', () => {
                dropZone.classList.remove('border-blue-400', 'bg-blue-50');
            });

            dropZone.addEventListener('drop', (e) => {
                e.preventDefault();
                dropZone.classList.remove('border-blue-400', 'bg-blue-50');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    fileInput.files = files;
                    // Handle file upload here
                }
            });
        });
    </script>
</body>
</html>