@extends('layouts.app')

@section('content')
<div class="bg-gray-100 p-6 min-h-screen">
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Bar Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Grafik Kehadiran</h2>
            <canvas id="kehadiranChart" height="300"></canvas>
        </div>

        <!-- Pie Chart -->
        <div class="bg-white rounded-2xl shadow-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-center">Grafik Kehadiran</h2>
            <canvas id="pieChart" height="300"></canvas>
        </div>
    </div>
    <div class="mt-4 text-center">
        <a href="{{Route('absen.index')}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Kembali ke Absen
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart
    const ctxBar = document.getElementById('kehadiranChart').getContext('2d');
    const kehadiranChart = new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: {!! json_encode($kehadiranData->keys()) !!},
            datasets: [{
                label: 'Jumlah Kehadiran',
                data: {!! json_encode($kehadiranData->values()) !!},
                backgroundColor: ['#10B981', '#EF4444', '#3B82F6', '#F59E0B'],
                borderRadius: 8
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Pie Chart (based on the uploaded image data)
    const ctxPie = document.getElementById('pieChart').getContext('2d');
    const pieChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: {!! json_encode($kehadiranData->keys()) !!},
            datasets: [{
                data: {!! json_encode($kehadiranData->values()) !!},
                backgroundColor: ['#3B82F6', '#EF4444', '#10B981', '#F59E0B', '#9CA3AF']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
        
    });


</script>
@endpush
