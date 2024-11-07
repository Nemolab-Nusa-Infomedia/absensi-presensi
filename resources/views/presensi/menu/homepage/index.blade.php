@extends('presensi.components.layout')

@section('content')
    <!-- Attendance Buttons -->
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <button class="btn btn-primary w-100 py-3">Masuk <br> -- : -- : -- WIB</button>
            </div>
            <div class="col-6">
                <button class="btn btn-primary w-100 py-3">Pulang <br> -- : -- : -- WIB</button>
            </div>
        </div>
    </div>

    <!-- Employee List -->
    <section class="text-center my-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{ route('presensi-home') }}">
                        <img src="{{ asset('assets/images/apk-presensi/menu/people.png') }}" alt="">
                        <p>Beranda</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('laporan-presensi') }}">
                        <img src="{{ asset('assets/images/apk-presensi/menu/people.png') }}" alt="">
                        <p>Laporan Presensi</p>
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img src="{{ asset('assets/images/apk-presensi/menu/people.png') }}" alt="">
                        <p>Izin Cuti</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('akun') }}">
                        <img src="{{ asset('assets/images/apk-presensi/menu/people.png') }}" alt="">
                        <p>Akun</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements -->
    <section class="container mb-0 py-3">
        <div class="d-flex justify-content-between">
            <h5>Pengumuman</h5>
            <a href="#">Lihat lainnya</a>
        </div>
        <div class="row col-md-12">
            <div class="col-md-3">
                <div class="announcement-card my-2 p-3 mb-2">
                    <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" class="img-fluid rounded" alt="WFH Image">
                    <h6 class="mt-2">Work From Home</h6>
                    <p>Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH</p>
                    <small class="text-muted">Hugo Studio - 26/09/2024</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="announcement-card my-2 p-3 mb-2">
                    <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" class="img-fluid rounded" alt="WFH Image">
                    <h6 class="mt-2">Work From Home</h6>
                    <p>Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH</p>
                    <small class="text-muted">Hugo Studio - 26/09/2024</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="announcement-card my-2 p-3 mb-2">
                    <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" class="img-fluid rounded" alt="WFH Image">
                    <h6 class="mt-2">Work From Home</h6>
                    <p>Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH</p>
                    <small class="text-muted">Hugo Studio - 26/09/2024</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="announcement-card my-2 p-3 mb-2">
                    <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" class="img-fluid rounded" alt="WFH Image">
                    <h6 class="mt-2">Work From Home</h6>
                    <p>Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH</p>
                    <small class="text-muted">Hugo Studio - 26/09/2024</small>
                </div>
            </div>
        </div>
    </section>
@endsection
