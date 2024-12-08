<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <h1 class="text-2xl font-bold">Statistik Grafik</h1>

            <!-- Grafik -->
            <main class="flex w-full">
                <div class="bg-white rounded shadow p-6 w-3/5">
                    <canvas id="statistikChart"></canvas>
                </div>
                <div class="w-2/5 px-4 gap-4 h-fit  grid grid-cols-2">
                    <div class="bg-white rounded h-fit p-2">
                        <h1>Total Materi</h1>
                        <p>{{$materiCount}}</p>

                    </div>
                    <div class="bg-white rounded h-fit p-2">
                        <h1>Total Tugas</h1>
                        <p>{{$tugasCount}}</p>

                    </div>
                    <div class="bg-white rounded h-fit p-2">
                        <h1>Total Mapel</h1>
                        <p>{{$mapelCount}}</p>

                    </div>

                </div>
            </main>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('statistikChart').getContext('2d');
        const dataChart = @json($dataChart);

        const statistikChart = new Chart(ctx, {
            type: 'bar', // Jenis grafik (bar chart)
            data: {
                labels: dataChart.labels, // Nama mata pelajaran
                datasets: [
                    {
                        label: 'Tugas',
                        data: dataChart.tugas, // Data jumlah tugas
                        backgroundColor: 'rgba(75, 192, 192, 0.6)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Materi',
                        data: dataChart.materi, // Data jumlah materi
                        backgroundColor: 'rgba(153, 102, 255, 0.6)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top', // Posisi legenda
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true, // Mulai dari 0
                    }
                }
            }
        });
    </script>
</x-app-layout>
