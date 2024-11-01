@extends('components.layout')

@section('content')
<div class="row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div id="forAlert">
        @if(session('success'))
        <div class="alert alert-success alert-icon" role="alert">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                    <i class="bx bx-check-shield text-white"></i>
                </div>
                <div class="flex-grow-1">
                    Berhasil !! {{ session('success') }}
                </div>
                <button type="button" class="btn-close px-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif
    </div>
        <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap justify-content-between gap-3">
                    <div class="search-bar">
                        <span><i class="bx bx-search-alt"></i></span>
                        <!-- Input search yang akan dihubungkan dengan DataTable -->
                        <input type="search" class="form-control" id="search" placeholder="Cari"/>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" data-bs-target="#create-employee" data-bs-toggle="modal">+ Tambah</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="table-responsive table-centered">
                    <table id="employee-table" class="table text-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 py-2">No</th>
                                <th class="border-0 py-2">Email</th>
                                <th class="border-0 py-2">Jenis Kelamin</th>
                                <th class="border-0 py-2">Alamat</th>
                                <th class="border-0 py-2">Divisi</th>
                                <th></th>
                            </tr>
                        </thead>
                    </table>
                </div>

                <!-- Custom Pagination -->
                <div class="align-items-center justify-content-between row g-0 text-center text-sm-start p-3 border-top">
                    <div class="col-sm">
                        <div class="text-muted">
                            Showing
                            <span class="fw-semibold" id="current-entries">0</span>
                            of
                            <span class="fw-semibold" id="total-entries">0</span>
                            entries
                        </div>
                    </div>
                    <div class="col-sm-auto mt-3 mt-sm-0">
                        <ul class="pagination pagination-rounded m-0" id="custom-pagination">
                            <!-- Pagination links akan diisi secara dinamis -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- tambah pegawai --}}
<div class="modal fade" id="create-employee" aria-hidden="true" aria-labelledby="createEmployee" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createEmployee">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user-store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                            <input type="text" id="namaPegawai" name="name" class="form-control" placeholder="masukan nama pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="emailPegawai" class="form-label">Email Pegawai</label>
                            <input type="email" id="emailPegawai" name="email" class="form-control" placeholder="masukan nama pegawai">
                        </div>
                        <div class="mb-3">
                            <label for="alamatPegawai" class="form-label">Alamat</label>
                            <textarea name="address" id="alamatPegawai" class="form-control"></textarea>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="genderPegawai" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="choices-single-no-search" name="gender" data-choices data-choices-search-false data-choices-removeItem>
                                    <option value="male">Laki - Laki</option>
                                    <option value="female">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="divisiPegawai" class="form-label">Divisi</label>
                                <select class="form-control" id="choices-single-no-search" name="divisi_id" data-choices data-choices-search-false data-choices-removeItem>
                                    @foreach($divisi as $list)
                                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="rolePegawai" class="form-label">Role</label>
                            <select class="form-control" id="choices-single-no-search" name="role_user" data-choices data-choices-search-false data-choices-removeItem>
                                    <option value="pegawai">Pegawai</option>
                                    <option value="magang">Magang</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Edit pegawai --}}
<div class="modal fade" id="edit-employee" aria-hidden="true" aria-labelledby="editEmployee" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployee">Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="mb-3">
                            <label for="namaPegawai" class="form-label">Nama Pegawai</label>
                            <input type="text" id="namaPegawai" name="" class="form-control" placeholder="masukan nama pegawai" value="">
                        </div>
                        <div class="mb-3">
                            <label for="namaPegawai" class="form-label">Role Pegawai</label>
                            <select class="form-control" id="choices-single-no-search" name="" data-choices data-choices-search-false data-choices-removeItem>
                                <option value="SuperAdmin">Super Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="Pegawai">Pegawai</option>
                                <option value="Magang">Magang</option>
                                <option value="PKL">PKL</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Divisi Pegawai</label>
                                <select class="form-control" id="choices-single-no-search" name="" data-choices data-choices-search-false data-choices-removeItem>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Web Developer">Web Developer</option>
                                    <option value="Creator">Creator</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="namaPegawai" class="form-label">Role Pegawai</label>
                                <select class="form-control" id="choices-single-no-search" name="" data-choices data-choices-search-false data-choices-removeItem>
                                    <option value="UI/UXDesigner">UI/UX Designer</option>
                                    <option value="FrontEndDev">FrontEnd Dev</option>
                                    <option value="BackEndDev">BackEnd Dev</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="emailPegawai" class="form-label">Email Pegawai</label>
                            <input type="email" id="emailPegawai" name="" class="form-control" placeholder="masukan email pegawai" value="">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</div>

{{-- Delete Pegawai --}}
<div class="modal fade" id="delete-employee" aria-hidden="true" aria-labelledby="deleteEmployee" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteEmployee">Hapus Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus pegawai ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function () {
        var currentPage = 1;
        var pageLength = 10; // Jumlah data per halaman

        // Inisialisasi DataTable dengan paging dinonaktifkan
        var table = $('#employee-table').DataTable({
            dom: '<"top">rt<"clear">', // Nonaktifkan paging default
            processing: true,
            serverSide: true,
            paging: false, // Disable default pagination
            ajax: {
                url: "",
                data: function(d) {
                    d.start = (currentPage - 1) * pageLength; // Tentukan offset data berdasarkan halaman saat ini
                    d.length = pageLength; // Tentukan jumlah data per halaman
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'companies', name: 'companies'},
                {data: 'email', name: 'email'},
                {data: 'roles', name: 'roles'},
                {data: 'divisis', name: 'divisis'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
            drawCallback: function(settings) {
                var pageInfo = table.page.info();
                var totalPages = Math.ceil(pageInfo.recordsDisplay / pageLength); // Hitung total halaman

                // Update pagination links
                var paginationHtml = '';
                for (var i = 1; i <= totalPages; i++) {
                    var activeClass = (i === currentPage) ? 'active' : '';
                    paginationHtml += '<li class="page-item ' + activeClass + '">';
                    paginationHtml += '<a href="#" class="page-link" data-page="' + i + '">' + i + '</a>';
                    paginationHtml += '</li>';
                }

                // Next and previous buttons
                paginationHtml = '<li class="page-item ' + (currentPage === 1 ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="prev"><i class="bx bx-left-arrow-alt"></i></a></li>'
                                + paginationHtml
                                + '<li class="page-item ' + (currentPage === totalPages ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="next"><i class="bx bx-right-arrow-alt"></i></a></li>';

                $('#custom-pagination').html(paginationHtml);

                // Update current entries info
                $('#current-entries').text(pageInfo.start + 1 + '-' + pageInfo.end);
                $('#total-entries').text(pageInfo.recordsDisplay);
            }
        });

        // Hubungkan input search dengan DataTable
        $('#search').on('keyup', function () {
            table.search(this.value).draw();
        });

        // Custom Pagination Event Handling
        $('#custom-pagination').on('click', 'a.page-link', function(e) {
            e.preventDefault();

            var page = $(this).data('page');

            // Update current page based on custom pagination
            if (page === "prev") {
                if (currentPage > 1) {
                    currentPage--;
                }
            } else if (page === "next") {
                if (currentPage < Math.ceil(table.page.info().recordsDisplay / pageLength)) {
                    currentPage++;
                }
            } else {
                currentPage = page;
            }

            // Reload DataTable with new page number
            table.ajax.reload();
        });
    });
</script>
@endsection
