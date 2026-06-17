<x-dashboard-layout>

    <x-slot name="title">
        Data Karyawan
    </x-slot>

    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

        <div class="px-8 py-6 border-b border-slate-200">

            <h2 class="text-2xl font-bold text-slate-800">
                Data Karyawan
            </h2>

            <p class="text-sm text-slate-500 mt-1">
                Daftar seluruh karyawan yang terdaftar pada sistem.
            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50 text-slate-600 text-sm uppercase">

                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">Email</th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($karyawans as $karyawan)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $karyawan->nama }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $karyawan->user->email ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <i data-lucide="users"
                                        class="w-14 h-14 text-slate-300 mb-4"></i>

                                    <p class="text-lg font-semibold text-slate-500">
                                        Belum ada data karyawan
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-dashboard-layout>