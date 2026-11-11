<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Akademik</title>
    <!-- Memuat aset Vite / Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Navigasi Sederhana / Header -->
        <nav class="bg-white border-b border-gray-100 shadow-sm py-4 mb-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <span class="font-bold text-lg text-gray-800">Sistem Akademik</span>
                <div class="space-x-4">
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-600 hover:text-gray-900">Dashboard</a>
                </div>
            </div>
        </nav>

        <!-- Konten Utama -->
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </main>
    </div>
</body>
</html>