<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'DevAcademy') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md fixed top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <a href="/" class="text-xl font-bold text-indigo-700">DevAcademy</a>
                <a href="{{ route('courses.index') }}" class="text-gray-700 hover:text-blue-600 text-lg">Kursus</a>
                <a href="{{ route('komunitas') }}" class="text-gray-700 hover:text-blue-600 text-lg">Komunitas</a>
            </div>
            <div>
                @auth
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-indigo-600 px-3">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 hover:text-indigo-600 px-3">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-indigo-600 px-3">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-indigo-600 px-3">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <!-- Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-100 text-center py-6 mt-16 shadow-inner">
        <p class="text-gray-500 text-sm">© {{ date('Y') }} DevAcademy. Dibuat oleh Uray Hafizh.</p>
    </footer>

</body>
</html>
