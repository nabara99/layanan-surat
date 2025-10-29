@extends('layouts.app')

@push('style')
    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
@endpush

@section('main')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h4 class="mb-0">Dashboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content Header-->

        <!--begin::App Content-->
        <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row - Statistics Cards-->
                <div class="row">
                    <!--begin::Col - Total Layanan-->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                        <div class="small-box" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                            <div class="inner">
                                <h3>{{ $totalLayanan }}</h3>
                                <p>Total Layanan</p>
                            </div>
                            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M5.625 1.5c-1.036 0-1.875.84-1.875 1.875v17.25c0 1.035.84 1.875 1.875 1.875h12.75c1.035 0 1.875-.84 1.875-1.875V12.75A3.75 3.75 0 0016.5 9h-1.875a1.875 1.875 0 01-1.875-1.875V5.25A3.75 3.75 0 009 1.5H5.625z"></path>
                                <path d="M12.971 1.816A5.23 5.23 0 0114.25 5.25v1.875c0 .207.168.375.375.375H16.5a5.23 5.23 0 013.434 1.279 9.768 9.768 0 00-6.963-6.963z"></path>
                            </svg>
                        </div>
                    </div>
                    <!--end::Col-->

                    @php
                        $colors = [
                            ['#4facfe', '#00f2fe'],
                            ['#43e97b', '#38f9d7'],
                            ['#fa709a', '#fee140'],
                            ['#30cfd0', '#330867'],
                            ['#a8edea', '#fed6e3'],
                        ];
                        $colorIndex = 0;
                    @endphp

                    @foreach($layananPerJenis as $jenis)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2">
                        <div class="small-box" style="background: linear-gradient(135deg, {{ $colors[$colorIndex % count($colors)][0] }} 0%, {{ $colors[$colorIndex % count($colors)][1] }} 100%); color: white;">
                            <div class="inner">
                                <h3>{{ $jenis->layanans_count }}</h3>
                                <p>{{ $jenis->nama_layanan }}</p>
                            </div>
                            <svg class="small-box-icon" fill="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M2.25 13.5a8.25 8.25 0 018.25-8.25.75.75 0 01.75.75v6.75H18a.75.75 0 01.75.75 8.25 8.25 0 01-16.5 0z">
                                </path>
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M12.75 3a.75.75 0 01.75-.75 8.25 8.25 0 018.25 8.25.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75V3z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    @php $colorIndex++; @endphp
                    @endforeach

                </div>
                <!--end::Row-->

                <!--begin::Row - Chart-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card mb-2">
                            <div class="card-header" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                <h3 class="card-title mb-0">
                                    <i class="bi bi-bar-chart-line me-2"></i>
                                    Statistik Layanan 3 Bulan Terakhir
                                </h3>
                            </div>
                            <div class="card-body">
                                <div id="layanan-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::App Content-->
    </main>
@endsection

@push('scripts')
    <!-- apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
        integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

    <script>
        // Layanan Chart
        const layanan_chart_options = {
            series: @json($seriesData),
            chart: {
                height: 320,
                type: 'line',
                toolbar: {
                    show: true,
                },
                zoom: {
                    enabled: true
                }
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'center',
            },
            colors: ['#667eea', '#4facfe', '#43e97b', '#fa709a', '#30cfd0'],
            dataLabels: {
                enabled: true,
            },
            stroke: {
                curve: 'smooth',
                width: 3
            },
            markers: {
                size: 5,
                hover: {
                    size: 7
                }
            },
            xaxis: {
                categories: @json($monthLabels),
                title: {
                    text: 'Bulan'
                }
            },
            yaxis: {
                title: {
                    text: 'Jumlah Layanan'
                },
                min: 0
            },
            tooltip: {
                shared: true,
                intersect: false,
                y: {
                    formatter: function (val) {
                        return val + " layanan"
                    }
                }
            },
            grid: {
                borderColor: '#e7e7e7',
                row: {
                    colors: ['#f3f3f3', 'transparent'],
                    opacity: 0.5
                },
            }
        };

        const layanan_chart = new ApexCharts(
            document.querySelector('#layanan-chart'),
            layanan_chart_options,
        );
        layanan_chart.render();
    </script>
@endpush
