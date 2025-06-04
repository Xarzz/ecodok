<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Adiwiyata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm border border-gray-200">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-green-100 p-3 rounded-full mb-2">
                <!-- Icon daun sesuai tema Adiwiyata -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </div>
            <h1 class="text-2xl font-bold text-gray-700">Login Adiwiyata</h1>
            <p class="text-sm text-gray-500">Program Lingkungan Sekolah</p>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login.proses') }}" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="name" id="name" required autofocus
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-green-600 focus:border-green-600">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-xl shadow-sm focus:outline-none focus:ring-green-600 focus:border-green-600">
            </div>
            <button type="submit"
                    class="w-full py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-xl shadow transition duration-300">
                Login
            </button>
        </form>
    </div>

</body>
</html>
