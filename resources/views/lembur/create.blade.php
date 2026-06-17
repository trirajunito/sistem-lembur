<x-dashboard-layout>

    <x-slot name="title">
        Tambah Lembur
    </x-slot>

    <div class="max-w-3xl mx-auto">

        <div class="bg-white rounded-2xl shadow-md p-8">

            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Tambah Pengajuan Lembur
                </h2>

                <p class="text-gray-500 mt-1">
                    Silakan isi data lembur dengan benar.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('lembur.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal
                    </label>

                    <input
                        type="date"
                        id="tanggal"
                        name="tanggal"
                        value="{{ old('tanggal') }}"
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label for="jam_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Mulai
                        </label>

                        <input
                            type="time"
                            id="jam_mulai"
                            name="jam_mulai"
                            value="{{ old('jam_mulai') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="jam_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                            Jam Selesai
                        </label>

                        <input
                            type="time"
                            id="jam_selesai"
                            name="jam_selesai"
                            value="{{ old('jam_selesai') }}"
                            class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                    </div>

                </div>

                <div>
                    <label for="pekerjaan" class="block text-sm font-medium text-gray-700 mb-2">
                        Deskripsi Pekerjaan
                    </label>

                    <textarea
                        id="pekerjaan"
                        name="pekerjaan"
                        rows="4"
                        placeholder="Masukkan pekerjaan yang dilakukan..."
                        class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('pekerjaan') }}</textarea>
                </div>

                <div class="flex justify-end gap-3 pt-4">

                    <a href="{{ route('lembur.index') }}"
                        class="px-5 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100 transition">
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2.5 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition">
                        Simpan
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-dashboard-layout>