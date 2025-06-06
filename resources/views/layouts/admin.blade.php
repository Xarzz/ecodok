<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiwiyata - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <!-- Mobile Menu Button -->
    <button id="mobile-menu-btn" class="lg:hidden fixed top-4 left-4 z-50 bg-white p-3 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-600"></i>
    </button>

    <!-- Sidebar -->
   @include('layouts.sidebar')
   <div class="lg:ml-64 min-h-screen">
    @yield('content')

   </div>
</body>
</html>