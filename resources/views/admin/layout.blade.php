<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Dian Gita Meilani')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: { 50: '#f0f9ff', 500: '#0ea5e9', 600: '#0284c7', 700: '#0369a1' },
                        secondary: { 500: '#d946ef', 600: '#c026d3' }
                    },
                    fontFamily: { 'sans': ['Inter', 'system-ui', 'sans-serif'] }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800">Admin Panel</h1>
                <p class="text-sm text-gray-600">{{ auth()->user()->name }}</p>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition duration-300 {{ request()->routeIs('admin.dashboard') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : '' }}">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="{{ route('admin.chat') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition duration-300 {{ request()->routeIs('admin.chat*') ? 'bg-primary-50 text-primary-600 border-r-2 border-primary-600' : '' }}">
                    <i class="fas fa-comments mr-3"></i>
                    Live Chat
                </a>
                <a href="{{ route('home') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-primary-50 hover:text-primary-600 transition duration-300">
                    <i class="fas fa-globe mr-3"></i>
                    View Portfolio
                </a>
                <form method="POST" action="{{ route('logout') }}" class="mt-4">
                    @csrf
                    <button type="submit" class="flex items-center w-full px-6 py-3 text-gray-700 hover:bg-red-50 hover:text-red-600 transition duration-300">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        Logout
                    </button>
                </form>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <h2 class="text-2xl font-semibold text-gray-800">@yield('header', 'Dashboard')</h2>
            </header>
            <main class="p-6 overflow-y-auto h-full">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
