<x-dashboard-layout>

    <x-slot name="title">
        @if(auth()->user()->role == 'karyawan')
            Pengajuan Lembur
        @elseif(auth()->user()->role == 'admin')
            Data Lembur
        @else
            Persetujuan Lembur
        @endif
    </x-slot>

    <div class="bg-white rounded-2xl shadow-lg border border-slate-200 overflow-hidden">

        <div class="px-8 py-6 border-b border-slate-200 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

            <div>

                <h2 class="text-2xl font-bold text-slate-800">

                    @if(auth()->user()->role == 'karyawan')
                        Riwayat Pengajuan Lembur
                    @elseif(auth()->user()->role == 'admin')
                        Data Seluruh Lembur
                    @else
                        Persetujuan Pengajuan Lembur
                    @endif

                </h2>

                <p class="text-sm text-slate-500 mt-1">
                    Kelola dan pantau data lembur karyawan.
                </p>

            </div>

            @if(auth()->user()->role == 'karyawan')

                <a href="{{ route('lembur.create') }}"
                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-3 rounded-xl transition shadow">

                    <i data-lucide="plus" class="w-4 h-4"></i>

                    Tambah Lembur

                </a>

            @endif

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-50 text-slate-600 text-sm uppercase">

                        <th class="px-6 py-4 text-left">No</th>
                        <th class="px-6 py-4 text-left">Nama</th>
                        <th class="px-6 py-4 text-left">Tanggal</th>
                        <th class="px-6 py-4 text-left">Jam</th>
                        <th class="px-6 py-4 text-left">Total</th>
                        <th class="px-6 py-4 text-left">Status</th>

                        @if(auth()->user()->role == 'atasan')
                            <th class="px-6 py-4 text-center">Aksi</th>
                        @endif

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-200">

                    @forelse($lemburs as $item)

                        <tr class="hover:bg-slate-50 transition">

                            <td class="px-6 py-4">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-6 py-4 font-medium text-slate-800">
                                {{ $item->karyawan->nama ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ substr($item->jam_mulai,0,5) }}
                                -
                                {{ substr($item->jam_selesai,0,5) }}
                            </td>

                            <td class="px-6 py-4 font-medium">
                                {{ $item->total_jam }} Jam
                            </td>

                            <td class="px-6 py-4">

                                @if($item->status == 'disetujui')

                                    <span class="inline-flex px-3 py-1 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium">
                                        Disetujui
                                    </span>

                                @elseif($item->status == 'ditolak')

                                    <span class="inline-flex px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-medium">
                                        Ditolak
                                    </span>

                                @else

                                    <span class="inline-flex px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-sm font-medium">
                                        Menunggu
                                    </span>

                                @endif

                            </td>

                            @if(auth()->user()->role == 'atasan')

                                <td class="px-6 py-4">

                                    @if($item->status == 'menunggu')

                                        <div class="flex justify-center gap-2">

                                            <form method="POST"
                                                action="{{ url('/lembur/'.$item->id.'/approve') }}">

                                                @csrf
                                                @method('PUT')

                                                <button type="submit"
                                                    class="px-4 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-700 text-white transition">

                                                    Setujui

                                                </button>

                                            </form>

                                            <form method="POST"
                                                action="{{ url('/lembur/'.$item->id.'/reject') }}">

                                                @csrf
                                                @method('PUT')

                                                <button type="submit"
                                                    class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white transition">

                                                    Tolak

                                                </button>

                                            </form>

                                        </div>

                                    @else

                                        <span class="text-slate-400 text-sm">
                                            Selesai
                                        </span>

                                    @endif

                                </td>

                            @endif

                        </tr>

                    @empty

                        <tr>

                            <td colspan="{{ auth()->user()->role == 'atasan' ? 7 : 6 }}"
                                class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center">

                                    <i data-lucide="inbox"
                                        class="w-14 h-14 text-slate-300 mb-4"></i>

                                    <p class="text-lg font-semibold text-slate-500">
                                        Belum ada data lembur
                                    </p>

                                    <p class="text-sm text-slate-400 mt-1">
                                        Data lembur akan muncul di sini.
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