<x-dashboard-layout>

    <x-slot name="title">
        Persetujuan Lembur
    </x-slot>

    <div class="bg-white rounded-xl shadow p-6">

        <h2 class="text-2xl font-bold mb-6">
            Persetujuan Lembur
        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-gray-100">

                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">Tanggal</th>
                        <th class="p-3 text-left">Pekerjaan</th>
                        <th class="p-3 text-left">Total Jam</th>
                        <th class="p-3 text-left">Status</th>
                        <th class="p-3 text-center">Aksi</th>

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

                            <td class="p-3">

                                @if($item->status == 'menunggu')

                                    <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full">
                                        Menunggu
                                    </span>

                                @elseif($item->status == 'disetujui')

                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                        Disetujui
                                    </span>

                                @else

                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
                                        Ditolak
                                    </span>

                                @endif

                            </td>

                            <td class="p-3">

                                @if($item->status == 'menunggu')

                                    <div class="flex gap-2">

                                        <form method="POST"
                                            action="{{ route('lembur.approve', $item->id) }}">

                                            @csrf
                                            @method('PUT')

                                            <button class="bg-green-500 text-white px-3 py-1 rounded">

                                                Setujui

                                            </button>

                                        </form>

                                        <form method="POST"
                                            action="{{ route('lembur.reject', $item->id) }}">

                                            @csrf
                                            @method('PUT')

                                            <button class="bg-red-500 text-white px-3 py-1 rounded">

                                                Tolak

                                            </button>

                                        </form>

                                    </div>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center p-5 text-gray-500">

                                Belum ada data lembur.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</x-dashboard-layout>