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
                            <li class="breadcrumb-item active" aria-current="page">Daftar Layanan</li>
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
                                <div class="row ">
                                    <h5>Tambah Layanan
                                        <a href="{{ route('services.index') }}" title="kembali">
                                            <button class="btn btn-primary">
                                                <i class="fa-regular fa-circle-left"></i>
                                            </button>
                                        </a>
                                    </h5>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('services.store')}}" method="POST">
                                    @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama Layanan</label>
                                            <input type="text" class="form-control" id="nama_layanan" name="nama_layanan"
                                                placeholder="Isi Nama Layanan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="intial_name">Inisial</label>
                                            <input type="text" class="form-control" id="initial_name" name="initial_name"
                                                placeholder="Isi Insial" required>
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
