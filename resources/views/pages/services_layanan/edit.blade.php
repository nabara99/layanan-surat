@extends('layouts.app')

@section('main')
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Layanan Surat</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Layanan</li>
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
            <!--begin::Row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h5>Edit Data Layanan
                                    <a href="{{ route('layanan.index') }}" title="Kembali">
                                        <button class="btn btn-primary">
                                            <i class="fa-regular fa-circle-left"></i>
                                        </button>
                                    </a>
                                </h5>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama"
                                                value="{{ old('nama', $layanan->nama) }}" placeholder="Isi Nama" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="nomor">Nomor</label>
                                            <input type="text" class="form-control" id="nomor" name="nomor"
                                                value="{{ old('nomor', $layanan->nomor) }}" placeholder="Isi Nomor Surat" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="tempat">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat" name="tempat"
                                                value="{{ old('tempat', $layanan->tempat ?? $layanan->tempat_lahir) }}" placeholder="Isi Tempat Lahir" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="tanggal">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                value="{{ old('tanggal', $layanan->tanggal ?? $layanan->tanggal_lahir) }}" required>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="agama">Agama</label>
                                            <select name="agama" id="agama" class="form-control">
                                                <option value="">-- Pilih Agama --</option>
                                                @foreach(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha'] as $agama)
                                                    <option value="{{ $agama }}"
                                                        {{ old('agama', $layanan->agama) == $agama ? 'selected' : '' }}>
                                                        {{ $agama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="status_perkawinan">Status Perkawinan</label>
                                            <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                                <option value="">-- Pilih Status --</option>
                                                @foreach(['Kawin', 'Belum Kawin', 'Cerai Hidup', 'Cerai Mati'] as $status)
                                                    <option value="{{ $status }}"
                                                        {{ old('status_perkawinan', $layanan->status_perkawinan) == $status ? 'selected' : '' }}>
                                                        {{ $status }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="jenis_kelamin">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                @foreach(['Laki-laki', 'Perempuan'] as $jk)
                                                    <option value="{{ $jk }}"
                                                        {{ old('jenis_kelamin', $layanan->jenis_kelamin) == $jk ? 'selected' : '' }}>
                                                        {{ $jk }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                                value="{{ old('pekerjaan', $layanan->pekerjaan) }}" placeholder="Isi Pekerjaan">
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="2" placeholder="Isi Alamat">{{ old('alamat', $layanan->alamat) }}</textarea>
                                        </div>

                                        <div class="col-md-12 mb-3">
                                            <label for="keperluan">Keperluan</label>
                                            <textarea class="form-control" id="keperluan" name="keperluan" rows="2" placeholder="Isi Keperluan">{{ old('keperluan', $layanan->keperluan) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success mt-3">Edit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
