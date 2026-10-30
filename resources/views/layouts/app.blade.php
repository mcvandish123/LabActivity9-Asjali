<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-slate-100 text-slate-800">
    <nav class="bg-emerald-700 text-white">
        <div class="max-w-5xl mx-auto px-4 py-3 flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div class="flex items-center gap-6">
                <a href="/dashboard" class="font-semibold tracking-wide">💉 Bakuna Tracker</a>
                @auth
                    <a href="/dashboard" class="text-sm hover:underline">Dashboard</a>
                    <a href="/schedule" class="text-sm hover:underline">Schedule</a>
                @endauth
            </div>
            <div class="flex items-center gap-4 text-sm">
                @auth
                    <span>Hi, {{ auth()->user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button class="underline">Logout</button>
                    </form>
                @endauth
                @guest
                    <a href="{{ route('login') }}">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    <main class="flex-1 w-full max-w-5xl mx-auto px-4 py-6">
        @yield('content')
    </main>

    <footer class="bg-slate-800 text-slate-300 text-sm">
        <div class="max-w-5xl mx-auto px-4 py-4 text-center">
            Bakuna Tracker &middot; Barangay Health Center &middot; {{ date('Y') }}
        </div>
    </footer>
</body>
</html>
