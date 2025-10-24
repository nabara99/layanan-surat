@extends('layouts.app')

@section('main')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8"></div>
                <div class="col-4">
                    @include('layouts.alert')
                </div>
            </div>
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
                                    <a href="{{ route('layanan.create') }}">
                                        <button class="btn btn-primary">
                                            Isi Layanan
                                        </button>
                                    </a>
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
                                            <th>Pekerjaan / Status</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Keperluan</th>
                                            <th>Keterangan</th>
                                            <th>Perbaikan</th>
                                            <th>Action</th>
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
                                                <td>{{ $row->pekerjaan ?? '-' }} / {{ $row->status_perkawinan }}</td>
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

                                                <td>
                                                    @if ($row->memo)
                                                        {{ $row->memo }}
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="d-flex justify-content-left">
                                                       @if ($row->status == false)
                                                        <a class="btn btn-sm btn-icon btn-warning"
                                                            href="{{ route('layanan.edit', $row->id) }}" title="edit">
                                                            <i class="fas fa-pencil"></i>
                                                        </a>
                                                        &nbsp;
                                                        <form action="{{ route('layanan.destroy', $row->id) }}" method="POST" class="ml-2">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                    onclick="return confirm('Yakin Ingin Menghapus Data?')"
                                                                    title="hapus">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>

                                                       @else

                                                       @endif
                                                        <a href="{{route('layanan.show', $row->id )}}"class="btn btn-info btn-sm" title="dokumen">
                                                             <i class="fas fa-file-alt"></i>
                                                        </a>
                                                    </div>
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
