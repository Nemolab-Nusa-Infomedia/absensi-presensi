@extends('components.layout')

@section('content')
<div class="row">
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
                        <button type="button" class="btn btn-primary" data-bs-target="#create-schedule" data-bs-toggle="modal">+ Tambah</button>
                    </div>
                </div>
            </div>
            <div>
                <div class="table-responsive table-centered">
                    <table id="account-table" class="table text-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 py-2">No</th>
                                <th class="border-0 py-2">Hari</th>
                                <th class="border-0 py-2">Jam Masuk</th>
                                <th class="border-0 py-2">Jam Pulang</th>
                                <th class="border-0 py-2">Type Kerja</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="border-0 py-2">1</th>
                                <th class="border-0 py-2">Senin</th>
                                <th class="border-0 py-2">09.00</th>
                                <th class="border-0 py-2">17.00</th>
                                <th class="border-0 py-2">WFH</th>
                                <th>
                                    <button type="button" class="btn btn-warning rounded-pill btn-sm" data-bs-target="#edit-schedule" data-bs-toggle="modal"><i class='bx bx-edit'></i></button>
                                    <button type="button" class="btn btn-danger rounded-pill btn-sm" data-bs-target="#delete-schedule" data-bs-toggle="modal"><i class='bx bx-trash'></i></button>
                                </th>
                            </tr>
                        </tbody>
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

{{-- tambah jadwal --}}
<div class="modal fade" id="create-schedule" aria-hidden="true" aria-labelledby="createSchedule" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSchedule">Tambah Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" id="hari" name="" class="form-control" placeholder="masukan hari">
                        </div>
                        <div class="mb-3">
                            <label for="jamMasuk" class="form-label">Jam Masuk</label>
                            <input type="time" id="jamMasuk" name="" class="form-control" placeholder="masukan jam masuk">
                        </div>
                        <div class="mb-3">
                            <label for="jamPulang" class="form-label">jam Pulang</label>
                            <input type="time" id="jamPulang" name="" class="form-control" placeholder="masukan jam pulang">
                        </div>
                        <div class="mb-3">
                            <label for="typeKerja" class="form-label">Type Kerja</label>
                            <select class="form-control" id="choices-single-no-search" name="" data-choices data-choices-search-false data-choices-removeItem>
                                <option value="WFO">WFO</option>
                                <option value="WFH">WFH</option>
                                <option value="WFA">WFA</option>
                           </select>
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

{{-- tambah jadwal --}}
<div class="modal fade" id="edit-schedule" aria-hidden="true" aria-labelledby="editSchedule" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSchedule">Edit Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="row">
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari</label>
                            <input type="text" id="hari" name="" class="form-control" placeholder="masukan hari" value="">
                        </div>
                        <div class="mb-3">
                            <label for="jamMasuk" class="form-label">Jam Masuk</label>
                            <input type="time" id="jamMasuk" name="" class="form-control" placeholder="masukan jam masuk" value="">
                        </div>
                        <div class="mb-3">
                            <label for="jamPulang" class="form-label">jam Pulang</label>
                            <input type="time" id="jamPulang" name="" class="form-control" placeholder="masukan jam pulang" value="">
                        </div>
                        <div class="mb-3">
                            <label for="typeKerja" class="form-label">Type Kerja</label>
                            <select class="form-control" id="choices-single-no-search" name="" data-choices data-choices-search-false data-choices-removeItem>
                                <option value="WFO">WFO</option>
                                <option value="WFH">WFH</option>
                                <option value="WFA">WFA</option>
                           </select>
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

{{-- Delete Jadwal --}}
<div class="modal fade" id="delete-schedule" aria-hidden="true" aria-labelledby="deleteProduct" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteProduct">Hapus Jadwal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus jadwal ini ?
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
        var table = $('#account-table').DataTable({
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
                {data: 'nameProduct', name: 'nameProduct'},
                {data: 'namaPembeli', name: 'namaPembeli'},
                {data: 'noHpPembeli', name: 'noHpPembeli'},
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
