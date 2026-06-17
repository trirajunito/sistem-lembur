<x-dashboard-layout>

    <x-slot name="title">
        Laporan Lembur
    </x-slot>

    <div class="bg-white rounded-xl shadow p-6">

        <div class="flex justify-between items-center mb-6">

            <h2 class="text-2xl font-bold">
                Laporan Lembur
            </h2>

            <button onclick="window.print()"
                class="bg-blue-500 text-white px-4 py-2 rounded-lg">

                Cetak Laporan

            </button>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left">Pekerjaan</th>
                        <th class="p-3 text-left">Total Jam</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($lemburs as $item)

                        <tr class="border-b">

                            <td class="p-3">
                                {{ $item->karyawan->nama ?? '-' }}
                            </td>

                            <td class="p-3">
                                {{ $item->tanggal }}
                            </td>

                            <td class="p-3">
                                {{ $item->pekerjaan }}
                            </td>

                            <td class="p-3">
                                {{ $item->total_jam }} Jam
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center p-5 text-gray-500">

                                Belum ada data lembur yang disetujui.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-dashboard-layout>