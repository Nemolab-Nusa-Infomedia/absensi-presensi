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
        <div class="alert alert-success alert-icon d-none" role="alert" id="alertt">
            <div class="d-flex align-items-center">
                <div class="avatar-sm rounded bg-success d-flex justify-content-center align-items-center fs-18 me-2 flex-shrink-0">
                    <i class="bx bx-check-shield text-white"></i>
                </div>
                <div class="flex-grow-1" id="alertt-text">
                    Berhasil !!
                </div>
                <button type="button" class="btn-close px-2" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
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
                </div>
            </div>
            <div>
                <div class="table-responsive table-centered">
                    <table id="pengumuman-table" class="table text-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 py-2">No</th>
                                <th class="border-0 py-2">Nama</th>
                                <th class="border-0 py-2">Tanggal Mulai</th>
                                <th class="border-0 py-2">Tanggal Akhir</th>
                                <th class="border-0 py-2">Jenis Izin</th>
                                <th class="border-0 py-2"></th>
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

{{-- approval --}}
<div class="modal fade" id="approval" aria-hidden="true" aria-labelledby="approval" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approval">Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pengumuman-store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <button type="button" class="btn btn-success btn-sm">Terima</button>
                            <button type="button" class="btn btn-danger btn-sm">Tolak</button>
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
<script type="text/javascript">
    $(function () {
        var currentPage = 1;
        var pageLength = 10; // Jumlah data per halaman

        // Inisialisasi DataTable dengan paging dinonaktifkan
        var table = $('#pengumuman-table').DataTable({
            dom: '<"top">rt<"clear">', // Nonaktifkan paging default
            processing: true,
            serverSide: true,
            paging: false, // Disable default pagination
            ajax: {
                url: "{{ route('izin-cuti-list') }}",
                data: function(d) {
                    d.start = (currentPage - 1) * pageLength; // Tentukan offset data berdasarkan halaman saat ini
                    d.length = pageLength; // Tentukan jumlah data per halaman
                }
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'users', name: 'users'},
                {data: 'tanggal_mulai', name: 'tanggal_mulai'},
                {data: 'tanggal_akhir', name: 'tanggal_akhir'},
                {data: 'jenis_izin', name: 'jenis_izin'},
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
        $('#pengumuman-table').on('click', '.btn-edit', function () {
            var id = $(this).data('id');
            // Ambil data dari server untuk mengisi form
            $.ajax({
                url: "/divisi/fetch/" + id,
                type: 'GET',
                success: function (data) {
                    $('#edit-divisi').modal('show');
                    $('#namaDivisiEdit').val(data.name);
                    $('#editDivisiForm').attr('action', '/divisi/update/' + id);
                }
            });
        });

        $('#editDivisiForm').on('submit', function (e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var actionUrl = $(this).attr('action');

                $.ajax({
                    url: actionUrl,
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        $('#edit-divisi').modal('hide');
                        table.ajax.reload(); // Reload data di DataTables
                        $('#alertt').removeClass('d-none');
                        $('#alertt-text').text(response.success);
                        setTimeout(function() {
                            $('#alertt').addClass('d-none');
                        }, 2000);
                    },
                    error: function (response) {
                        console.log(response);
                    }
                });
        });

        $(document).on('click', '.btn-delete', function() {
            var id = $(this).data('id');
            console.log(id);
            $('#delete-divisi').modal('show');

            // Saat tombol konfirmasi delete di klik
            $('#deleteDivisiBtn').off('click').on('click', function() {
                $.ajax({
                    url: "/divisi/delete/" + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        $('#delete-divisi').modal('hide');  // Tutup modal setelah berhasil hapus
                        $('#pengumuman-table').DataTable().ajax.reload();  // Reload DataTables

                        // Tampilkan pesan sukses
                       $('#alertt').removeClass('d-none');
                        $('#alertt-text').text(response.success);
                        setTimeout(function() {
                            $('#alertt').addClass('d-none');
                        }, 2000);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    });
</script>
@endsection
