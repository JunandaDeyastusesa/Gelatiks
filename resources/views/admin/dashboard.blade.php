@extends('layouts.admin.app')

@section('title', 'Gelatik Supra')
@section('nav-title', 'Dashboard')

@section('content')

    <div class="row">
        <main class="px-4 ms-sm-auto dashboard">
            <!-- Stats Cards -->
            <div class="row row-cols-md-4 g-3 mb-4">
                <div class="col">
                    <div class="card position-relative" style="background: #FFDEF2; color: #EC008C;">
                        <h6 class="text-muted pb-1">Jobs</h6>
                        <h2 class="fw-semibold">{{ str_pad($totJobs, 3, '0', STR_PAD_LEFT) }}</h2>

                        <i class="bi bi-briefcase-fill position-absolute bottom-0 end-0 m-2"
                            style="font-size: 4rem; opacity: 0.2;"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="card position-relative" style="background: #DEF1FF; color: #28A6FF;">
                        <h6 class="text-muted pb-1">Applicants</h6>
                        <h2 class="fw-semibold">{{ str_pad($totApplicants, 3, '0', STR_PAD_LEFT) }}</h2>
                        <i class="bi bi-people-fill position-absolute bottom-0 end-0 m-2"
                            style="font-size: 4rem; opacity: 0.2;"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="card position-relative" style="background: #FFEBDE; color: #EC3F00;">
                        <h6 class="text-muted pb-1">Partnership</h6>
                        <h2 class="fw-semibold">{{ str_pad($totPartnership, 3, '0', STR_PAD_LEFT) }}</h2>
                        <i class="bi bi-clipboard-data-fill position-absolute bottom-0 end-0 m-2"
                            style="font-size: 4rem; opacity: 0.2;"></i>
                    </div>
                </div>
                <div class="col">
                    <div class="card position-relative" style="background: #DEFFE3; color: #00CA25;">
                        <h6 class="text-muted pb-1">Accepted</h6>
                        <h2 class="fw-semibold">{{ str_pad($totAccepted, 3, '0', STR_PAD_LEFT) }}</h2>
                        <i class="bi bi-check-circle-fill position-absolute bottom-0 end-0 m-2"
                            style="font-size: 4rem; opacity: 0.2; padding-bottom: 0px;"></i>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="mt-5">
                <div class="row g-4">
                    <!-- Col Table -->
                    <div class="col-8">
                        <div class="card h-100 p-4" style="border-radius: 20px; background-color: #fff7fa;">
                            <h5 class="mb-4">New Applicants</h5>
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th>Jobs Name</th>
                                            <th>Applicant</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($applicants as $applicant)
                                            <tr>
                                                <td class="py-3">{{ $applicant->job->jobs_name }}</td>
                                                <td class="py-3">{{ $applicant->user->profile->namaLengkap }}</td>
                                                <td class="py-3">{{ $applicant->created_at->format('d M Y') }}</td>
                                                <td class="py-3">
                                                    @if ($applicant->status == 'In Review')
                                                        <span class="badge btn-review">Done Review</span>
                                                    @elseif ($applicant->status == 'Interview')
                                                        <span class="badge btn-interview">Interview</span>
                                                    @elseif ($applicant->status == 'Accepted')
                                                        <span class="badge btn-accepted">Accepted</span>
                                                    @elseif ($applicant->status == 'Rejected')
                                                        <span class="badge btn-rejected">Rejected</span>
                                                    @else
                                                        <span class="badge btn-wait-review">Waiting Review</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Col Chart -->
                    <div class="col-4">
                        <div class="card h-100 p-4" style="border-radius: 20px; background-color: #fff7fa;">
                            <h5 class="mb-3 text-center">Job Apply Status</h5>
                            <div class="justify-content-center" style="width:200px; height:200px; margin:auto;">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="d-flex justify-content-center mt-4">
                                <ul class="list-unstyled d-flex flex-wrap justify-content-center gap-2 mb-0"
                                    id="chart-legend" style="max-width:400px; font-size: 12px;"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection

@push('scripts')
    <script type="module">
        $(document).ready(function() {
            $('#newsEventTable').DataTable();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = @json($labels);
        const values = @json($values);

        const colorMap = {
            'Waiting Review': '#EEF35E',
            'In Review': '#F3BF5E',
            'Interview': '#5EEEF3',
            'Accepted': '#5EF38B',
            'Rejected': '#FF8080'
        };

        const backgroundColors = labels.map(label => colorMap[label] || '#CCCCCC');

        // Hitung total
        const total = values.reduce((a, b) => a + b, 0);

        // Plugin untuk tampilkan total di tengah
        const centerText = {
            id: 'centerText',
            beforeDraw(chart) {
                const {
                    ctx,
                    chartArea: {
                        width,
                        height
                    }
                } = chart;
                ctx.save();
                ctx.font = 'bold 24px Arial';
                ctx.fillStyle = '#333';
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.fillText(total, width / 2, height / 2);
            }
        };

        // Chart
        const ctx = document.getElementById('myPieChart').getContext('2d');
        new Chart(ctx, {
            type: 'doughnut', // ganti pie jadi doughnut
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: backgroundColors,
                    hoverOffset: 4
                }]
            },
            options: {
                cutout: '65%', // besar lubang tengah
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    }
                }
            },
            plugins: [centerText]
        });

        // Custom Legend
        const legendContainer = document.getElementById('chart-legend');
        labels.forEach((label, index) => {
            const totalStatus = values[index];
            const color = backgroundColors[index];

            const li = document.createElement('li');
            li.classList.add('mb-2');
            li.innerHTML = `
        <span style="display:inline-block; width:15px; height:15px; background-color:${color}; margin-right:6px;"></span>
        ${label} = <strong style="margin-right:16px">${totalStatus}</strong>
    `;
            legendContainer.appendChild(li);
        });
    </script>
@endpush
