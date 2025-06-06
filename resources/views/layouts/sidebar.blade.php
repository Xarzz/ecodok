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
            <a href="{{ route('admin.dashboard') }}"
   class="nav-item flex items-center px-6 py-4 border-r-4 transition-all
   {{ request()->is('dashboard') 
        ? 'bg-blue-50 text-blue-600 border-blue-500' 
        : 'text-gray-700 hover:bg-blue-50 hover:text-blue-600 hover:border-blue-500 border-transparent' }}">
    <i class="fas fa-chart-line mr-3 text-lg"></i>
    <span class="font-medium">Dashboard</span>
</a>

            <!-- Contoh: link aktif warna hijau dan border kiri -->
<a href="{{ route('jadwal-piket.index') }}"
   class="nav-item flex items-center px-6 py-4 border-r-4 transition-all
   {{ request()->is('jadwal-piket*') 
        ? 'bg-green-50 text-green-600 border-green-500' 
        : 'text-gray-700 hover:bg-green-50 hover:text-green-600 hover:border-green-500 border-transparent' }}">
    <i class="fas fa-calendar-alt mr-3 text-lg"></i>
    <span class="font-medium">Jadwal Piket</span>
</a>
<a href="{{ route('dokumentasi.index') }}"
   class="nav-item flex items-center px-6 py-4 border-r-4 transition-all
   {{ request()->is('dokumentasi') 
        ? 'bg-purple-50 text-purple-600 border-purple-500' 
        : 'text-gray-700 hover:bg-purple-50 hover:text-purple-600 hover:border-purple-500 border-transparent' }}">
    <i class="fas fa-folder-open mr-3 text-lg"></i>
    <span class="font-medium">Dokumentasi</span>
</a>

        <a href="{{ route('kelas-siswa.index') }}"
   class="nav-item flex items-center px-6 py-4 border-r-4 transition-all
   {{ request()->is('kelas') 
        ? 'bg-orange-50 text-orange-600 border-orange-500' 
        : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600 hover:border-orange-500 border-transparent' }}">
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