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
                </div>
            </div>
            <div>
                <div class="table-responsive table-centered">
                    <table id="attendances-table" class="table text-nowrap mb-0">
                        <thead class="bg-light bg-opacity-50">
                            <tr>
                                <th class="border-0 py-2">No</th>
                                <th class="border-0 py-2">Nama</th>
                                <th class="border-0 py-2">Tanggal Hari</th>
                                <th class="border-0 py-2">Masuk</th>
                                <th class="border-0 py-2">Pulang</th>
                                <th class="border-0 py-2">Catatan</th>
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



<script type="text/javascript">
    $(function () {
        let currentPage = 1;
        const pageLength = 10; // Jumlah data per halaman

        // Inisialisasi DataTable tanpa pagination bawaan
        const table = $('#attendances-table').DataTable({
            dom: '<"top">rt<"clear">', // Nonaktifkan paging default
            processing: true,
            serverSide: true,
            paging: false, // Disable default pagination
            ajax: {
                url: "{{ route('daftar-hadir-list') }}",
                data: function (d) {
                    d.start = (currentPage - 1) * pageLength; // Tentukan offset
                    d.length = pageLength; // Tentukan jumlah data per halaman
                }
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                { data: 'users', name: 'users' },
                { data: 'created_at', name: 'created_at' },
                { data: 'check_in', name: 'check_in' },
                { data: 'check_out', name: 'check_out' },
                { data: 'notes', name: 'notes' },
            ],
            drawCallback: function (settings) {
                const pageInfo = table.page.info();
                const totalPages = Math.ceil(pageInfo.recordsTotal / pageLength); // Hitung total halaman

                // Update custom pagination
                updatePagination(totalPages);
                $('#current-entries').text(`${pageInfo.start + 1}-${pageInfo.end}`);
                $('#total-entries').text(pageInfo.recordsTotal);
            }
        });

        // Hubungkan input search dengan DataTable
        $('#search').on('keyup', function () {
            table.search(this.value).draw();
        });

        // Fungsi untuk memperbarui pagination custom
        function updatePagination(totalPages) {
            let paginationHtml = '';

            // Tombol Previous
            paginationHtml += `
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a href="#" class="page-link" data-page="prev">
                        <i class="bx bx-left-arrow-alt"></i>
                    </a>
                </li>
            `;

            // Nomor Halaman
            for (let i = 1; i <= totalPages; i++) {
                paginationHtml += `
                    <li class="page-item ${i === currentPage ? 'active' : ''}">
                        <a href="#" class="page-link" data-page="${i}">${i}</a>
                    </li>
                `;
            }

            // Tombol Next
            paginationHtml += `
                <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <a href="#" class="page-link" data-page="next">
                        <i class="bx bx-right-arrow-alt"></i>
                    </a>
                </li>
            `;

            $('#custom-pagination').html(paginationHtml);
        }

        // Event handling untuk custom pagination
        $('#custom-pagination').on('click', 'a.page-link', function (e) {
            e.preventDefault();
            const page = $(this).data('page');

            if (page === 'prev' && currentPage > 1) {
                currentPage--;
            } else if (page === 'next' && currentPage < Math.ceil(table.page.info().recordsTotal / pageLength)) {
                currentPage++;
            } else if (typeof page === 'number') {
                currentPage = page;
            }

            // Reload DataTable dengan halaman baru
            table.ajax.reload();
        });
    });
</script>
@endsection
