@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
@endpush

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
                        <li class="breadcrumb-item active" aria-current="page">Tambah Layanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Layanan
                                <a href="{{ route('layanan.index') }}" title="Kembali">
                                    <button class="btn btn-primary">
                                        <i class="fa-regular fa-circle-left"></i>
                                    </button>
                                </a>
                            </h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('layanan.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="id_layanan">Jenis Layanan <span class="text-danger">*</span> </label>
                                        <select name="id_layanan" id="id_layanan" class="form-control" required>
                                            <option value="">Pilih Jenis Layanan</option>
                                            @foreach($jenisLayanan as $jenis)
                                                <option value="{{ $jenis->id }}" data-initial="{{ $jenis->initial_name }}">{{ $jenis->nama_layanan }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="nomor">Nomor  <span class="text-danger">*</span> </label>
                                        <input type="text" name="nomor" id="nomor" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="nama">Nama  <span class="text-danger">*</span> </label>
                                        <input type="text" name="nama" id="nama" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="tempat">Tempat Lahir  <span class="text-danger">*</span> </label>
                                        <input type="text" name="tempat" id="tempat" class="form-control" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="tanggal">Tanggal Lahir  <span class="text-danger">*</span> </label>
                                        <input type="date" name="tanggal" id="tanggal" class="form-control datepicker" required>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="agama">Agama  <span class="text-danger">*</span> </label>
                                        <select name="agama" id="agama" class="form-control" required>
                                            <option value="">Pilih Agama</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="nik">NIK</label>
                                        <input type="text" name="nik" id="nik" class="form-control" maxlength="16" >
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control">
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="status_perkawinan">Status Perkawinan  <span class="text-danger">*</span> </label>
                                        <select name="status_perkawinan" id="status_perkawinan" class="form-control" required>
                                            <option value="">Pilih Status</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Cerai Hidup">Cerai Hidup</option>
                                            <option value="Cerai Mati">Cerai Mati</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="jenis_kelamin">Jenis Kelamin  <span class="text-danger">*</span> </label>
                                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                            <option value="">Pilih Jenis Kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="alamat">Alamat  <span class="text-danger">*</span> </label>
                                        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                                    </div>

                                    <div class="col-md-12 mb-2">
                                        <label for="keperluan">Keperluan</label>
                                        <textarea name="keperluan" id="keperluan" class="form-control"></textarea>
                                    </div>

                                    <!-- Fields untuk SKK (Surat Keterangan Kematian) - Hidden by default -->
                                    <div id="skk-fields" style="display: none;" class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="tanggal_meninggal">Tanggal Meninggal <span class="text-danger">*</span></label>
                                                <input type="date" name="tanggal_meninggal" id="tanggal_meninggal" class="form-control">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="tempat_meninggal">Tempat Meninggal <span class="text-danger">*</span></label>
                                                <input type="text" name="tempat_meninggal" id="tempat_meninggal" class="form-control">
                                            </div>

                                            <div class="col-md-12 mb-2">
                                                <label for="penyebab_meninggal">Penyebab Meninggal <span class="text-danger">*</span></label>
                                                <textarea name="penyebab_meninggal" id="penyebab_meninggal" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-success mt-2">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection
@push('scripts')
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jenisLayananSelect = document.getElementById('id_layanan');
            const skkFields = document.getElementById('skk-fields');
            const tanggalMeninggalInput = document.getElementById('tanggal_meninggal');
            const tempatMeninggalInput = document.getElementById('tempat_meninggal');
            const penyebabMeninggalTextarea = document.getElementById('penyebab_meninggal');

            function toggleSKKFields() {
                const selectedOption = jenisLayananSelect.options[jenisLayananSelect.selectedIndex];
                const initialName = selectedOption.getAttribute('data-initial');

                if (initialName === 'SKK') {
                    // Show SKK fields
                    skkFields.style.display = 'block';

                    // Make fields required
                    tanggalMeninggalInput.setAttribute('required', 'required');
                    tempatMeninggalInput.setAttribute('required', 'required');
                    penyebabMeninggalTextarea.setAttribute('required', 'required');
                } else {
                    // Hide SKK fields
                    skkFields.style.display = 'none';

                    // Remove required attribute
                    tanggalMeninggalInput.removeAttribute('required');
                    tempatMeninggalInput.removeAttribute('required');
                    penyebabMeninggalTextarea.removeAttribute('required');

                    // Clear values
                    tanggalMeninggalInput.value = '';
                    tempatMeninggalInput.value = '';
                    penyebabMeninggalTextarea.value = '';
                }
            }

            // Listen for changes on jenis layanan select
            jenisLayananSelect.addEventListener('change', toggleSKKFields);

            // Run on page load in case there's a pre-selected value
            toggleSKKFields();
        });
    </script>
@endpush
