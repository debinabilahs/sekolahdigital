@extends('admin.dashboard')
@section('dashboard', 'collapsed')
@section('content')
    <section class="section dashboard">
        <!-- Left side columns -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang, {{ Auth::user()->username }}</h3>
                                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="alert alert-success">
                    Hallo, Selamat Datang
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Revenue Card -->
            <div class=" col-3">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Data Guru</h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi-card-list"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $guru }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->
            <!-- Revenue Card -->
            <div class="col-3">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Data Siswa</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-journal-text"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $siswa }}</h6>
                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->


            <!-- Revenue Card -->
            <div class=" col-3">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Uang Pangkal</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-currency-dollar"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $detpangkal }}</h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Revenue Card -->

            <!-- Revenue Card -->
            <div class=" col-3">
                <div class="card info-card revenue-card">

                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                                <h6>Filter</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Today</a></li>
                            <li><a class="dropdown-item" href="#">This Month</a></li>
                            <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Pembayaran</span></h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-layout-text-window-reverse"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pembayaran }}</h6>


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section><!-- End Revenue Card -->

    <section class="section">
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Uang Pangkal</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="barChart" style="width: 50%; height: 50%"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pembayaran</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="lineChart" style="width: 50%; height: 50%"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="barChart" width="400" height="400"></canvas>
    <script>
        const ctx = document.getElementById('barChart');
        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['TKJ', 'RPL', 'TKR', 'TBSM', 'TITL'],
                datasets: [{
                        label: 'TKJ',
                        data: [{{ $tkj }}],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',



                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',


                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'RPL',
                        data: [{{ $rpl }}],
                        backgroundColor: [

                            'rgba(54, 162, 235, 0.2)',

                        ],
                        borderColor: [

                            'rgba(54, 162, 235, 1)',

                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'TKR',
                        data: [{{ $tkr }}],
                        backgroundColor: [

                            'rgba(255, 206, 86, 0.2)',
                        ],
                        borderColor: [

                            'rgba(255, 206, 86, 1)',

                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'TBSM',
                        data: [{{ $tbsm }}],
                        backgroundColor: [

                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [

                            'rgba(75, 192, 192, 1)',

                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'TITL',
                        data: [{{ $titl }}],
                        backgroundColor: [

                            'rgba(153, 102, 255, 0.2)',

                        ],
                        borderColor: [

                            'rgba(153, 102, 255, 1)',

                        ],
                        borderWidth: 1
                    },
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <canvas id="lineChart" width="400" height="400"></canvas>
    <script>
        const ctr = document.getElementById('lineChart');
        const lineChart = new Chart(ctr, {
            type: 'line',
            data: {
                labels: ['Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                ],
                datasets: [{
                    label: 'Tanggal Pembayaran',
                    data: [{{ $pem_jan }},
                        {{ $pem_feb }},
                        {{ $pem_mar }},
                        {{ $pem_apr }},
                        {{ $pem_mei }},
                        {{ $pem_jun }},
                        {{ $pem_jul }},
                        {{ $pem_agu }},
                        {{ $pem_sep }},
                        {{ $pem_okt }},
                        {{ $pem_nov }},
                        {{ $pem_nov }},
                    ],
                    backgroundColor: [

                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [

                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]

            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
