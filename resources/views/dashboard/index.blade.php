@extends('components.layout')

@section('content')
<div class="row">
    <div class="col-xxl-3">
        <div class="row">
            <div class="col-md-6 col-xxl-12">
                <div class="card rounded-5">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="avatar-md bg-secondary bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bxs-calendar text-secondary fs-20'></i>
                                </div>
                            </div>
                            <div class="col-8 text-end">
                                <h4 id="waktu" class="text-dark mt-1 mb-0">
                                    {{-- hari tanggal bulan tahun --}}
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
            <div class="col-md-6 col-xxl-12">
                <div class="card rounded-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <div class="avatar-md bg-secondary bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bxs-time text-secondary fs-20'></i>
                                </div>
                            </div>
                            <div class="col-8 text-end d-flex justify-content-end align-items-center">
                                <h4 id="time" class="text-dark mt-1 mb-0">
                                    <!-- Waktu akan tampil di sini -->
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-info bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bxs-user-rectangle text-info fs-32'></i>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">
                                    Karyawan
                                </p>
                                <h3 class="text-dark mt-1 mb-0">
                                    {{ $countPegawai }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-purple bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bxs-user-badge text-purple fs-32'></i>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">
                                    Magang
                                </p>
                                <h3 class="text-dark mt-1 mb-0">
                                    {{ $countMagang }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-primary bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bx-male text-primary fs-32' ></i>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">
                                    Laki-laki
                                </p>
                                <h3 class="text-dark mt-1 mb-0">
                                    {{ $laki }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="avatar-md bg-pink bg-opacity-10 rounded d-flex justify-content-center align-items-center">
                                    <i class='bx bx-female text-pink fs-32' ></i>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <p class="text-muted mb-0 text-truncate">
                                    Perempuan
                                </p>
                                <h3 class="text-dark mt-1 mb-0">
                                    {{ $perempuan }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-9">
        <div class="card">
            <div class="card-body p-0">
                <div class="row g-0">
                    <div class="col-lg-12 border-start">
                        <div class="p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">
                                    Kehadiran
                                </h4>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-light">
                                        ALL
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light">
                                        1M
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light">
                                        6M
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-light active">
                                        1Y
                                    </button>
                                </div>
                            </div>

                            <div dir="ltr">
                                <div id="dash-performance-chart" class="apex-charts"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updateTime() {
        // Mendapatkan waktu saat ini
        const now = new Date();
        // Mengambil jam, menit, dan detik dari zona waktu lokal
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        // Menampilkan waktu
        document.getElementById('time').textContent = `${hours}:${minutes}:${seconds}`;
    }

    // Memperbarui waktu setiap detik
    setInterval(updateTime, 1000);

    // Memanggil fungsi pertama kali agar langsung menampilkan waktu
    updateTime();
</script>

<script>
    function updateTime() {
        // Pilih zona waktu yang diinginkan, contoh: "Asia/Jakarta" untuk WIB
        const timeZone = "Asia/Jakarta";

        // Dapatkan waktu saat ini berdasarkan zona waktu
        const now = new Date().toLocaleString('id-ID', {
            timeZone: timeZone,
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });

        // Update elemen HTML dengan waktu saat ini
        document.getElementById("waktu").textContent = now;
    }

    // Panggil fungsi untuk mengupdate waktu setiap detik (1000ms)
    setInterval(updateTime, 1000);

    // Jalankan fungsi pertama kali saat halaman dimuat
    updateTime();
</script>
@endsection
