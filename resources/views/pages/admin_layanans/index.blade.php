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
                                                <th>Status / Jenkel</th>
                                                <th>Alamat</th>
                                                <th>Keperluan</th>
                                                <th>Keterangan</th>
                                                <th>Status Verifikasi</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($layanan as $index => $row)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $row->jenisLayanan->nama_layanan ?? '-' }}</td>
                                                    <td>{{ $row->nama }} <br> {{ $row->nik ?? '-' }} </td>
                                                    <td>{{ $row->tempat }} <br>
                                                        {{ \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }} </td>
                                                    <td>{{ $row->agama }}</td>
                                                    <td>{{ $row->pekerjaan ?? '-' }}</td>
                                                    <td>{{ $row->status_perkawinan }} <br> {{ $row->jenis_kelamin }} </td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>{{ $row->keperluan ?? '-' }}</td>


                                                    <td>
                                                        @if ($row->jenisLayanan->initial_name == 'SKK')
                                                            Meninggal Tgl
                                                            :{{ $row->tanggal_meninggal ? \Carbon\Carbon::parse($row->tanggal_meninggal)->format('d-m-Y') : '-' }}
                                                            Tempat : {{ $row->tempat_meninggal ?? '-' }}
                                                            Penyebab : {{ $row->penyebab_meninggal ?? '-' }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->status == true)
                                                            <button class="btn btn-sm btn-success">Sudah</button>
                                                        @else
                                                            <button class="btn btn-sm btn-warning">Belum</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-left gap-1">
                                                            <a href="{{ route('layanan.show', $row->id) }}"
                                                                title="lihat dokumen" class="btn btn-primary btn-sm"
                                                                target="_blank">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>



                                                            @if ($row->status == true)
                                                            @else
                                                                <form id="status-form-{{ $row->id }}"
                                                                    action="{{ route('update.status', $row->id) }}"
                                                                    method="POST" style="display:inline;">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button type="button" class="btn btn-warning btn-sm"
                                                                        onclick="confirmUpdate({{ $row->id }})" title="ubah status">
                                                                        <i class="fa-regular fa-circle-check"></i>
                                                                    </button>
                                                                </form>
                                                                <button type="button" class="btn btn-info btn-sm memo-btn"
                                                                    data-id="{{ $row->id }}"
                                                                    data-nama="{{ $row->nama }}"
                                                                    data-memo="{{ $row->memo ?? '' }}"
                                                                    title="memo">
                                                                    <i class="fas fa-pencil"></i>
                                                                </button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if ($layanan->isEmpty())
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

    <!-- Modal Memo -->
    <div class="modal fade" id="memoModal" tabindex="-1" aria-labelledby="memoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-gradient-primary text-white">
                    <h5 class="modal-title" id="memoModalLabel">
                        <i class="fas fa-sticky-note me-2"></i>Memo Catatan
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="memoForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Pemohon:</label>
                            <p id="pemohonNama" class="text-muted"></p>
                        </div>
                        <div class="mb-3">
                            <label for="memoText" class="form-label fw-bold">Catatan <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="memoText" name="memo" rows="5"
                                placeholder="Tuliskan catatan untuk layanan ini..." required></textarea>
                            <small class="text-muted">Catatan ini dapat dilihat oleh admin untuk keperluan internal.</small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan Memo
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- SweetAlert2 CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM Loaded - Initializing memo functionality');

        // Confirm Update Status
        window.confirmUpdate = function(id) {
            Swal.fire({
                title: 'Yakin Ubah Status?',
                text: "Anda akan mengubah status surat",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ya, Ubah!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('status-form-' + id).submit();
                }
            });
        };

        // Open memo modal function
        window.openMemoModal = function(layananId, nama, existingMemo) {
            console.log('Opening memo modal for:', layananId, nama);

            // Set form action URL
            const form = document.getElementById('memoForm');
            if (!form) {
                console.error('Form memoForm tidak ditemukan!');
                return;
            }
            form.action = '/layanan/' + layananId + '/memo';

            // Set nama pemohon
            const pemohonNama = document.getElementById('pemohonNama');
            if (pemohonNama) {
                pemohonNama.textContent = nama;
            }

            // Set existing memo if any
            const memoText = document.getElementById('memoText');
            if (memoText) {
                memoText.value = existingMemo || '';
            }

            // Open modal - check if bootstrap is available
            const modalElement = document.getElementById('memoModal');
            if (modalElement) {
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    // Bootstrap 5 way
                    const memoModal = new bootstrap.Modal(modalElement);
                    memoModal.show();
                } else if (typeof $ !== 'undefined' && $.fn.modal) {
                    // jQuery Bootstrap way
                    $(modalElement).modal('show');
                } else {
                    // Fallback: manual show using classes
                    modalElement.classList.add('show');
                    modalElement.style.display = 'block';
                    document.body.classList.add('modal-open');

                    // Create backdrop
                    const backdrop = document.createElement('div');
                    backdrop.className = 'modal-backdrop fade show';
                    backdrop.id = 'memoModalBackdrop';
                    document.body.appendChild(backdrop);
                }
            } else {
                console.error('Modal memoModal tidak ditemukan!');
            }
        };

        // Event delegation for memo button clicks
        document.body.addEventListener('click', function(e) {
            const button = e.target.closest('.memo-btn');
            if (button) {
                console.log('Memo button clicked!');
                const layananId = button.getAttribute('data-id');
                const nama = button.getAttribute('data-nama');
                const existingMemo = button.getAttribute('data-memo');

                openMemoModal(layananId, nama, existingMemo);
            }
        });

        // Close modal when close button clicked
        document.addEventListener('click', function(e) {
            if (e.target.matches('[data-bs-dismiss="modal"]') || e.target.closest('[data-bs-dismiss="modal"]')) {
                const modalElement = document.getElementById('memoModal');
                if (modalElement) {
                    modalElement.classList.remove('show');
                    modalElement.style.display = 'none';
                    document.body.classList.remove('modal-open');
                    const backdrop = document.getElementById('memoModalBackdrop');
                    if (backdrop) {
                        backdrop.remove();
                    }
                }
            }
        });

        // Handle form submission with AJAX
        const memoForm = document.getElementById('memoForm');
        if (memoForm) {
            memoForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const form = this;
                const formData = new FormData(form);
                const url = form.action;

                // Show loading
                Swal.fire({
                    title: 'Menyimpan...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                fetch(url, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Close modal
                        const modalElement = document.getElementById('memoModal');
                        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                            const memoModal = bootstrap.Modal.getInstance(modalElement);
                            if (memoModal) {
                                memoModal.hide();
                            }
                        } else if (typeof $ !== 'undefined' && $.fn.modal) {
                            $(modalElement).modal('hide');
                        } else {
                            // Manual close
                            modalElement.classList.remove('show');
                            modalElement.style.display = 'none';
                            document.body.classList.remove('modal-open');
                            const backdrop = document.getElementById('memoModalBackdrop');
                            if (backdrop) {
                                backdrop.remove();
                            }
                        }

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: data.message || 'Memo berhasil disimpan',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // Reload page to show updated data
                            location.reload();
                        });
                    } else {
                        throw new Error(data.message || 'Terjadi kesalahan');
                    }
                })
                .catch(error => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: error.message || 'Gagal menyimpan memo'
                    });
                });
            });
        }
    });
    </script>

    {{-- Alert sukses --}}
    @if(session('success'))
    <script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil!',
        text: '{{ session("success") }}',
        timer: 2000,
        showConfirmButton: false
    });
    </script>
    @endif

@endpush

