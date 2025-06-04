<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiwiyata - Dashboard Siswa</title>
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
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        
        .upload-zone {
            transition: all 0.3s ease;
        }
        
        .upload-zone:hover {
            border-color: #10b981;
            background-color: #f0fdf4;
        }
        
        .status-badge {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
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
                    <p class="text-sm opacity-90">Dashboard Siswa</p>
                </div>
            </div>
        </div>
        
        <!-- Navigation -->
        <nav class="mt-6">
            <a href="#" onclick="showPage('dashboard')" class="nav-item active flex items-center px-6 py-4 text-gray-700 hover:bg-green-50 hover:text-green-600 border-r-4 border-transparent hover:border-green-500 transition-all">
                <i class="fas fa-home mr-3 text-lg"></i>
                <span class="font-medium">Dashboard</span>
            </a>
            <a href="#" onclick="showPage('upload')" class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-blue-50 hover:text-blue-600 border-r-4 border-transparent hover:border-blue-500 transition-all">
                <i class="fas fa-upload mr-3 text-lg"></i>
                <span class="font-medium">Upload Dokumentasi</span>
            </a>
            <a href="#" onclick="showPage('history')" class="nav-item flex items-center px-6 py-4 text-gray-700 hover:bg-purple-50 hover:text-purple-600 border-r-4 border-transparent hover:border-purple-500 transition-all">
                <i class="fas fa-history mr-3 text-lg"></i>
                <span class="font-medium">Riwayat Dokumentasi</span>
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
            <!-- Welcome Header -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white p-6 rounded-2xl mb-6 shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl lg:text-3xl font-bold mb-2">Selamat Datang, Ahmad! 👋</h2>
                        <p class="text-green-100" id="current-date"></p>
                        <p class="text-green-100">Kelas: XII IPA 1</p>
                    </div>
                    <div class="hidden lg:block">
                        <i class="fas fa-seedling text-6xl opacity-20"></i>
                    </div>
                </div>
            </div>

            <!-- Today's Tasks -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-bold text-gray-800">Jadwal Piket Hari Ini</h3>
                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        <i class="fas fa-calendar-day mr-1"></i>
                        Hari Ini
                    </span>
                </div>

                <div class="space-y-4">
                    <!-- Task 1 -->
                    <div class="border border-gray-200 rounded-xl p-4 card-hover">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="bg-green-100 p-3 rounded-lg">
                                    <i class="fas fa-seedling text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-lg">Siraman Tanaman</h4>
                                    <p class="text-gray-600 mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Taman Depan Sekolah
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        07:00 - 07:30 WIB
                                    </p>
                                </div>
                            </div>
                            <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm font-medium status-badge">
                                ✅ Sudah
                            </span>
                        </div>
                    </div>

                    <!-- Task 2 -->
                    <div class="border border-gray-200 rounded-xl p-4 card-hover">
                        <div class="flex items-start justify-between">
                            <div class="flex items-start space-x-4">
                                <div class="bg-blue-100 p-3 rounded-lg">
                                    <i class="fas fa-broom text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-800 text-lg">Cek Kebersihan</h4>
                                    <p class="text-gray-600 mb-2">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Ruang Kelas XII IPA 1
                                    </p>
                                    <p class="text-sm text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        15:30 - 16:00 WIB
                                    </p>
                                </div>
                            </div>
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium status-badge">
                                ❌ Belum
                            </span>
                        </div>
                        <div class="mt-4 pt-4 border-t border-gray-100">
                            <button onclick="showPage('upload')" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors text-sm font-medium">
                                <i class="fas fa-upload mr-2"></i>
                                Upload Dokumentasi
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded-xl shadow-lg text-center card-hover">
                    <div class="bg-green-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-check text-green-600 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">8</p>
                    <p class="text-sm text-gray-600">Tugas Selesai</p>
                </div>
                
                <div class="bg-white p-4 rounded-xl shadow-lg text-center card-hover">
                    <div class="bg-orange-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">2</p>
                    <p class="text-sm text-gray-600">Pending</p>
                </div>
                
                <div class="bg-white p-4 rounded-xl shadow-lg text-center card-hover">
                    <div class="bg-blue-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-images text-blue-600 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">15</p>
                    <p class="text-sm text-gray-600">Dokumentasi</p>
                </div>
                
                <div class="bg-white p-4 rounded-xl shadow-lg text-center card-hover">
                    <div class="bg-purple-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-trophy text-purple-600 text-xl"></i>
                    </div>
                    <p class="text-2xl font-bold text-gray-800">85%</p>
                    <p class="text-sm text-gray-600">Skor</p>
                </div>
            </div>
        </div>

        <!-- Upload Page -->
        <div id="upload-page" class="page-content p-4 lg:p-6 hidden">
            <div class="mb-6">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Upload Dokumentasi</h2>
                <p class="text-gray-600">Upload foto atau video kegiatan lingkungan</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Upload Form -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Form Upload</h3>
                    
                    <form class="space-y-6">
                        <!-- Task Selection -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tasks mr-2"></i>
                                Pilih Jadwal Tugas
                            </label>
                            <select class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all">
                                <option>Pilih tugas yang akan didokumentasikan...</option>
                                <option>Cek Kebersihan - Ruang Kelas XII IPA 1</option>
                                <option>Buang Sampah - Area Kantin</option>
                                <option>Siraman Tanaman - Taman Belakang</option>
                            </select>
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-camera mr-2"></i>
                                Upload Foto/Video
                            </label>
                            <div class="upload-zone border-2 border-dashed border-gray-300 rounded-xl p-8 text-center cursor-pointer">
                                <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-4"></i>
                                <p class="text-gray-600 font-medium mb-2">Klik atau drag & drop file di sini</p>
                                <p class="text-sm text-gray-400">Maksimal 10MB (JPG, PNG, MP4)</p>
                                <input type="file" class="hidden" accept="image/*,video/*" id="file-input">
                            </div>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-comment mr-2"></i>
                                Keterangan (Opsional)
                            </label>
                            <textarea rows="4" class="w-full p-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="Tambahkan keterangan tentang kegiatan yang dilakukan..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="w-full bg-green-600 text-white p-4 rounded-xl hover:bg-green-700 transition-colors font-medium text-lg">
                            <i class="fas fa-upload mr-2"></i>
                            Upload Dokumentasi
                        </button>
                    </form>
                </div>

                <!-- Preview -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-6">Preview Upload</h3>
                    
                    <div id="preview-area" class="text-center text-gray-400 py-12">
                        <i class="fas fa-image text-6xl mb-4"></i>
                        <p>Preview file akan muncul di sini</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- History Page -->
        <div id="history-page" class="page-content p-4 lg:p-6 hidden">
            <div class="mb-6">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-800 mb-2">Riwayat Dokumentasi</h2>
                <p class="text-gray-600">Lihat semua dokumentasi yang telah diupload</p>
            </div>

            <!-- Filter -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Bulan</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option>Januari 2024</option>
                            <option>Desember 2023</option>
                            <option>November 2023</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                        <select class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option>Semua Kategori</option>
                            <option>Siraman</option>
                            <option>Cek Kebersihan</option>
                            <option>Buang Sampah</option>
                        </select>
                    </div>
                    <div class="flex items-end">
                        <button class="w-full bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition-colors">
                            <i class="fas fa-search mr-2"></i>Filter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Documentation Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="https://via.placeholder.com/300x200" alt="Dokumentasi" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-seedling mr-1"></i>Siraman
                            </span>
                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">
                                ✅ Approved
                            </span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Siraman Tanaman Pagi</h4>
                        <p class="text-sm text-gray-600 mb-2">Taman Depan Sekolah</p>
                        <p class="text-xs text-gray-500">15 Januari 2024, 07:15</p>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="https://via.placeholder.com/300x200" alt="Dokumentasi" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-blue-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-broom mr-1"></i>Kebersihan
                            </span>
                            <span class="bg-yellow-500 text-white px-2 py-1 rounded-full text-xs">
                                ⏳ Pending
                            </span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Pembersihan Kelas</h4>
                        <p class="text-sm text-gray-600 mb-2">Ruang Kelas XII IPA 1</p>
                        <p class="text-xs text-gray-500">14 Januari 2024, 15:45</p>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden card-hover">
                    <img src="https://via.placeholder.com/300x200" alt="Dokumentasi" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-xs font-medium">
                                <i class="fas fa-trash mr-1"></i>Sampah
                            </span>
                            <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs">
                                ✅ Approved
                            </span>
                        </div>
                        <h4 class="font-semibold text-gray-800 mb-1">Pembuangan Sampah</h4>
                        <p class="text-sm text-gray-600 mb-2">Area Kantin</p>
                        <p class="text-xs text-gray-500">13 Januari 2024, 12:30</p>
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
                item.classList.remove('active', 'bg-green-50', 'text-green-600', 'border-green-500');
            });
            
            // Add active class to current nav item
            event.target.closest('.nav-item').classList.add('active', 'bg-green-50', 'text-green-600', 'border-green-500');
            
            // Close mobile menu
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }

        // File upload functionality
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.getElementById('file-input');
            const uploadZone = document.querySelector('.upload-zone');
            const previewArea = document.getElementById('preview-area');

            uploadZone.addEventListener('click', () => fileInput.click());

            uploadZone.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadZone.classList.add('border-green-400', 'bg-green-50');
            });

            uploadZone.addEventListener('dragleave', () => {
                uploadZone.classList.remove('border-green-400', 'bg-green-50');
            });

            uploadZone.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadZone.classList.remove('border-green-400', 'bg-green-50');
                const files = e.dataTransfer.files;
                if (files.length > 0) {
                    handleFileUpload(files[0]);
                }
            });

            fileInput.addEventListener('change', (e) => {
                if (e.target.files.length > 0) {
                    handleFileUpload(e.target.files[0]);
                }
            });

            function handleFileUpload(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    if (file.type.startsWith('image/')) {
                        previewArea.innerHTML = `
                            <img src="${e.target.result}" alt="Preview" class="max-w-full h-auto rounded-lg shadow-lg">
                            <p class="mt-2 text-sm text-gray-600">${file.name}</p>
                        `;
                    } else if (file.type.startsWith('video/')) {
                        previewArea.innerHTML = `
                            <video controls class="max-w-full h-auto rounded-lg shadow-lg">
                                <source src="${e.target.result}" type="${file.type}">
                            </video>
                            <p class="mt-2 text-sm text-gray-600">${file.name}</p>
                        `;
                    }
                };
                reader.readAsDataURL(file);
            }
        });

        // Initialize active nav item
        document.querySelector('.nav-item').classList.add('active', 'bg-green-50', 'text-green-600', 'border-green-500');
    </script>
</body>
</html>