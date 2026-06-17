<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name', 'Sistem Lembur') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-slate-100">

    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="fixed left-0 top-0 h-screen w-72 bg-slate-900 text-slate-200 shadow-2xl">

            <div class="px-8 py-8 border-b border-slate-800">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 rounded-xl bg-blue-600 flex items-center justify-center">

                        <i data-lucide="clock-3" class="w-6 h-6 text-white"></i>

                    </div>

                    <div>

                        <h1 class="text-xl font-bold text-white">
                            Sistem Lembur
                        </h1>

                        <p class="text-sm text-slate-400">
                            PT. Perusahaan Swasta
                        </p>

                    </div>

                </div>

            </div>

            <nav class="p-4 space-y-2">

                <a href="{{ route('dashboard') }}"
                    class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                    {{ request()->routeIs('dashboard')
                        ? 'bg-blue-600 text-white shadow-lg'
                        : 'hover:bg-slate-800 text-slate-300' }}">

                    <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

                    <span>Dashboard</span>

                </a>

                {{-- KARYAWAN --}}
                @if((Auth::user()->role ?? '') === 'karyawan')

                    <a href="{{ route('lembur.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                        {{ request()->routeIs('lembur.*')
                            ? 'bg-blue-600 text-white shadow-lg'
                            : 'hover:bg-slate-800 text-slate-300' }}">

                        <i data-lucide="file-plus-2" class="w-5 h-5"></i>

                        <span>Pengajuan Lembur</span>

                    </a>

                    @if(Route::has('laporan.index'))

                        <a href="{{ route('laporan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                            {{ request()->routeIs('laporan.*')
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'hover:bg-slate-800 text-slate-300' }}">

                            <i data-lucide="file-text" class="w-5 h-5"></i>

                            <span>Laporan</span>

                        </a>

                    @endif

                {{-- ADMIN --}}
                @elseif((Auth::user()->role ?? '') === 'admin')

                    @if(Route::has('karyawan.index'))

                        <a href="{{ route('karyawan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                            {{ request()->routeIs('karyawan.*')
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'hover:bg-slate-800 text-slate-300' }}">

                            <i data-lucide="users" class="w-5 h-5"></i>

                            <span>Data Karyawan</span>

                        </a>

                    @endif

                    <a href="{{ route('lembur.index') }}"
                        class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                        {{ request()->routeIs('lembur.*')
                            ? 'bg-blue-600 text-white shadow-lg'
                            : 'hover:bg-slate-800 text-slate-300' }}">

                        <i data-lucide="clipboard-list" class="w-5 h-5"></i>

                        <span>Data Lembur</span>

                    </a>

                    @if(Route::has('laporan.index'))

                        <a href="{{ route('laporan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                            {{ request()->routeIs('laporan.*')
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'hover:bg-slate-800 text-slate-300' }}">

                            <i data-lucide="file-text" class="w-5 h-5"></i>

                            <span>Laporan</span>

                        </a>

                    @endif

                {{-- ATASAN --}}
                @elseif((Auth::user()->role ?? '') === 'atasan')

                    @if(Route::has('approval.index'))

                        <a href="{{ route('approval.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                            {{ request()->routeIs('approval.*')
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'hover:bg-slate-800 text-slate-300' }}">

                            <i data-lucide="badge-check" class="w-5 h-5"></i>

                            <span>Persetujuan</span>

                        </a>

                    @endif

                    @if(Route::has('laporan.index'))

                        <a href="{{ route('laporan.index') }}"
                            class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all
                            {{ request()->routeIs('laporan.*')
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'hover:bg-slate-800 text-slate-300' }}">

                            <i data-lucide="file-text" class="w-5 h-5"></i>

                            <span>Laporan</span>

                        </a>

                    @endif

                @endif

            </nav>

        </aside>

        <!-- Content -->
        <div class="flex-1 ml-72">

            <!-- Navbar -->
            <header class="bg-white border-b border-slate-200 px-8 py-5 flex justify-between items-center">

                <div>

                    <h2 class="text-2xl font-bold text-slate-800">
                        {{ $title ?? 'Dashboard' }}
                    </h2>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola data lembur dengan mudah dan terintegrasi.
                    </p>

                </div>

                <div class="flex items-center gap-4">

                    <div class="text-right">

                        <p class="font-semibold text-slate-800">
                            {{ Auth::user()->name }}
                        </p>

                        <p class="text-sm text-slate-500">
                            {{ Auth::user()->email }}
                        </p>

                        <span class="inline-flex mt-2 px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold capitalize">

                            {{ Auth::user()->role }}

                        </span>

                    </div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition">

                            Logout

                        </button>

                    </form>

                </div>

            </header>

            <main class="p-8">

                {{ $slot }}

            </main>

        </div>

    </div>

    <script>
        lucide.createIcons();
    </script>

</body>

</html>