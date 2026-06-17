<x-guest-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 relative overflow-hidden">

        <!-- Background -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-300/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 min-h-screen flex items-center justify-center px-6 py-10">

            <div class="w-full max-w-6xl rounded-3xl overflow-hidden shadow-2xl bg-white/80 backdrop-blur-lg">

                <div class="grid grid-cols-1 lg:grid-cols-2">

                    <!-- Left Section -->
                    <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 text-white p-12 lg:p-16 flex flex-col justify-between">

                        <div>

                            <!-- Logo -->
                            <div class="flex items-center gap-4 mb-8">

                                <div class="w-14 h-14 rounded-2xl bg-blue-500 flex items-center justify-center shadow-lg shadow-blue-500/30">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-7 h-7 text-white"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor">

                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />

                                    </svg>

                                </div>

                                <div>

                                    <h1 class="text-4xl font-bold">
                                        Sistem Lembur
                                    </h1>

                                    <p class="text-slate-400">
                                        PT. Perusahaan Swasta
                                    </p>

                                </div>

                            </div>

                            <p class="text-xl text-slate-300 leading-relaxed">
                                Kelola pengajuan, persetujuan, dan laporan lembur karyawan secara cepat, mudah, dan terintegrasi.
                            </p>

                            <!-- Features -->
                            <div class="mt-10 space-y-5">

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-blue-300"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16.862 4.487a2.25 2.25 0 113.182 3.182L7.5 20.213 3 21l.787-4.5L16.862 4.487z" />

                                        </svg>

                                    </div>

                                    <span class="text-lg">
                                        Pengajuan lembur online
                                    </span>

                                </div>

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-green-300"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 12.75L11.25 15 15 9.75m6 2.25a9 9 0 11-18 0 9 9 0 0118 0z" />

                                        </svg>

                                    </div>

                                    <span class="text-lg">
                                        Persetujuan atasan real-time
                                    </span>

                                </div>

                                <div class="flex items-center gap-4">

                                    <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-6 h-6 text-cyan-300"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor">

                                            <path stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M3 13h4v8H3zm7-6h4v14h-4zm7-4h4v18h-4z" />

                                        </svg>

                                    </div>

                                    <span class="text-lg">
                                        Laporan lembur otomatis
                                    </span>

                                </div>

                            </div>

                        </div>

                        <!-- Statistics -->
                        <div class="grid grid-cols-3 gap-4 mt-12">

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <h3 class="text-2xl font-bold">
                                    24/7
                                </h3>

                                <p class="text-sm text-slate-300">
                                    Akses Sistem
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <h3 class="text-2xl font-bold">
                                    100%
                                </h3>

                                <p class="text-sm text-slate-300">
                                    Digital
                                </p>

                            </div>

                            <div class="bg-white/10 rounded-2xl p-4 text-center">

                                <h3 class="text-2xl font-bold">
                                    Real-Time
                                </h3>

                                <p class="text-sm text-slate-300">
                                    Approval
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Right Section -->
                    <div class="p-10 lg:p-16 flex items-center">

                        <div class="w-full max-w-md mx-auto">

                            <div class="text-center mb-10">

                                <h2 class="text-4xl font-bold text-slate-800">
                                    Selamat Datang
                                </h2>

                                <p class="text-gray-500 mt-2">
                                    Silakan masuk ke akun Anda
                                </p>

                            </div>

                            <x-auth-session-status
                                class="mb-4"
                                :status="session('status')" />

                            <form method="POST"
                                action="{{ route('login') }}"
                                class="space-y-5">

                                @csrf

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <x-input-error
                                        :messages="$errors->get('email')"
                                        class="mt-2" />

                                </div>

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        required
                                        autocomplete="current-password"
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <x-input-error
                                        :messages="$errors->get('password')"
                                        class="mt-2" />

                                </div>

                                <div class="flex items-center justify-between text-sm">

                                    <label class="flex items-center gap-2 text-gray-600">

                                        <input
                                            type="checkbox"
                                            name="remember"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">

                                        Ingat saya

                                    </label>

                                    @if (Route::has('password.request'))

                                        <a href="{{ route('password.request') }}"
                                            class="text-blue-600 hover:text-blue-700">

                                            Lupa password?

                                        </a>

                                    @endif

                                </div>

                                <button
                                    type="submit"
                                    class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition duration-300 shadow-lg shadow-blue-500/30">

                                    Masuk

                                </button>

                            </form>

                            <p class="text-center text-gray-500 mt-8">

                                Belum punya akun?

                                <a href="{{ route('register') }}"
                                    class="text-blue-600 font-semibold hover:text-blue-700">

                                    Daftar

                                </a>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>