<x-dashboard-layout>

    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-gradient-to-r from-blue-600 to-blue-500 rounded-2xl p-6 shadow-lg text-white">

            <p class="text-blue-100">
                Total Karyawan
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalKaryawan }}
            </h2>

        </div>

        <div class="bg-gradient-to-r from-emerald-600 to-emerald-500 rounded-2xl p-6 shadow-lg text-white">

            <p class="text-emerald-100">
                Total Lembur
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ $totalLembur }}
            </h2>

        </div>

        <div class="bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl p-6 shadow-lg text-white">

            <p class="text-orange-100">
                Total Jam Lembur
            </p>

            <h2 class="text-4xl font-bold mt-3">
                {{ number_format($totalJam, 1) }} Jam
            </h2>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow-lg mt-8 p-6">

        <div class="flex justify-between items-center mb-6">

            <div>

                <h3 class="text-xl font-bold text-slate-800">
                    Statistik Lembur
                </h3>

                <p class="text-sm text-slate-500 mt-1">
                    Total jam lembur yang telah disetujui
                </p>

            </div>

        </div>

        <div class="h-[420px]">

            <canvas id="chartLembur"></canvas>

        </div>

    </div>

    <script>
        const ctx = document.getElementById('chartLembur');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($bulan),
                datasets: [{
                    label: 'Jam Lembur',
                    data: @json($jamLembur),
                    backgroundColor: '#2563eb',
                    borderRadius: 10,
                    maxBarThickness: 50
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e2e8f0'
                        },
                        ticks: {
                            precision: 0
                        }
                    },

                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>

</x-dashboard-layout>