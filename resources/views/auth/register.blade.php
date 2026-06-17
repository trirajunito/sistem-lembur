<x-guest-layout>

    <div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 relative overflow-hidden">

        <!-- Background -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-blue-300/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-indigo-300/20 rounded-full blur-3xl"></div>

        <div class="relative z-10 min-h-screen flex items-center justify-center px-6 py-10">

            <div class="w-full max-w-6xl rounded-3xl overflow-hidden shadow-2xl bg-white/80 backdrop-blur-lg">

                <div class="grid grid-cols-1 lg:grid-cols-2">

                    <!-- Kiri -->
                    <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-blue-900 text-white p-12 lg:p-16 flex flex-col justify-between">

                        <div>

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
                                Daftarkan akun untuk mengelola pengajuan, persetujuan, dan laporan lembur karyawan secara mudah dan terintegrasi.
                            </p>

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
                                                d="M17 20h5V4H2v16h5m10 0v-5a2 2 0 00-2-2H9a2 2 0 00-2 2v5m10 0H7" />

                                        </svg>

                                    </div>

                                    <span class="text-lg">
                                        Manajemen data lembur
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
                                        Persetujuan real-time
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
                                        Laporan otomatis
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- Kanan -->
                    <div class="p-10 lg:p-16 flex items-center">

                        <div class="w-full max-w-md mx-auto">

                            <div class="text-center mb-8">

                                <h2 class="text-4xl font-bold text-slate-800">
                                    Buat Akun
                                </h2>

                                <p class="text-gray-500 mt-2">
                                    Lengkapi data di bawah untuk mendaftar
                                </p>

                            </div>

                            <form method="POST"
                                action="{{ route('register') }}"
                                class="space-y-5">

                                @csrf

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />

                                </div>

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Email
                                    </label>

                                    <input
                                        type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        required
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                                </div>

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password"
                                        required
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                </div>

                                <div>

                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Konfirmasi Password
                                    </label>

                                    <input
                                        type="password"
                                        name="password_confirmation"
                                        required
                                        class="w-full rounded-xl border-gray-300 py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">

                                </div>

                                <button
                                    type="submit"
                                    class="w-full py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold transition duration-300 shadow-lg shadow-blue-500/30">

                                    Daftar

                                </button>

                            </form>

                            <p class="text-center text-gray-500 mt-8">

                                Sudah punya akun?

                                <a href="{{ route('login') }}"
                                    class="text-blue-600 font-semibold hover:text-blue-700">

                                    Masuk

                                </a>

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>