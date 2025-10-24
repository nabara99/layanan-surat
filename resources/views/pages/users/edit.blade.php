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
                        <h3 class="mb-0">Daftar User</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Daftar User</li>
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
                                    <h5>Edit User
                                        <a href="{{ route('users.index') }}" title="kembali">
                                            <button class="btn btn-primary">
                                                <i class="fa-regular fa-circle-left"></i>
                                            </button>
                                        </a>
                                    </h5>

                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="{{route('users.update', $users)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="name">Nama User</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $users->name }}"
                                                placeholder="Isi Nama User " required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ $users->email }}"
                                                placeholder="Isi Email User" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Isi Password User" >
                                        </div>
                                        <div class="form-group">
                                            <label for="role_id">Role</label>
                                             <select name="role_id" id="role" class="form-control">
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}"
                                                        {{old('role_id', $users->role_id) == $role->id ? 'selected' :''}}>
                                                        {{$role->name}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                     <button type="submit" class="btn btn-success mt-2">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
