@extends('layouts.app')

@section('main')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Layanan Surat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Layanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Layanan
                                </h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Layanan</th>
                                            <th>Nama / NIK</th>
                                            <th>TTL</th>
                                            <th>Agama</th>
                                            <th>Pekerjaan</th>
                                            <th>Status</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Keperluan</th>
                                            <th>Keterangan</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($layanan as $index => $row)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $row->jenisLayanan->nama_layanan ?? '-' }}</td>
                                                <td>{{ $row->nama }} <br> {{ $row->nik ?? '-' }} </td>
                                                <td>{{ $row->tempat }} <br> {{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }} </td>
                                                <td>{{ $row->agama }}</td>
                                                <td>{{ $row->pekerjaan ?? '-' }}</td>
                                                <td>{{ $row->status_perkawinan }}</td>
                                                <td>{{ $row->jenis_kelamin }}</td>
                                                <td>{{ $row->alamat }}</td>
                                                <td>{{ $row->keperluan ?? '-' }}</td>

                                                <td>
                                                    @if ($row->jenisLayanan->initial_name == 'SKK' )
                                                    Meninggal Tgl :{{ $row->tanggal_meninggal ? \Carbon\Carbon::parse($row->tanggal_meninggal)->format('d-m-Y') : '-' }}
                                                    Tempat : {{ $row->tempat_meninggal ?? '-' }}
                                                    Penyebab : {{ $row->penyebab_meninggal ?? '-' }}
                                                    @else

                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        @if($layanan->isEmpty())
                                            <tr>
                                                <td colspan="16" class="text-center">Tidak ada data layanan</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
