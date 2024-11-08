@extends('presensi.components.layout')

@section('content')
    <!-- Attendance Buttons -->
    <div class="container text-center">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('presensi-scan') }}"><button class="btn btn-primary w-100 py-3">Masuk <br>
                    {{ $check_in }}
                    </button>
                </a>
            </div>
            <div class="col-6">
                <a href="{{ route('presensi-scan') }}"><button class="btn btn-primary w-100 py-3">Pulang <br>
                    {{ $check_out }}
                    </button>
                </a>
            </div>
        </div>
    </div>
    <!-- Employee List -->
    <section class="text-center my-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="{{ route('presensi-home') }}">
                        <img src="{{ asset('assets/images/apk-presensi/menu/home.png') }}" alt="">
                        <p>Beranda</p>
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('laporan-presensi') }}">
                        <img src="{{ asset('assets/images/apk-presensi/menu/laporan.png') }}" alt="">
                        <p>Laporan Presensi</p>
                    </a>
                </div>
                <div class="col">
                    <a href="">
                        <img src="{{ asset('assets/images/apk-presensi/menu/cuti.png') }}" alt="">
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
        <div class="row col-md-12 scrollable-announcements">
            <div class="col-md-3">
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
                <div class="announcement-card my-2 p-3 mb-2">
                    <div class="d-flex flex-wrap align-items-center gap-2">
                        <img src="{{ asset('assets/images/apk-presensi/pengumuman/image1.png') }}" alt="" class="" style="width: 100px" />
                        <div class="d-block">
                            <h5 class="mb-1 text-start text-dark">
                                Work From Home
                            </h5>
                            <h6 class="mb-0 text-start text-dark">
                                Rabu, Kamis, Jumat di minggu ke-3 & ke-4 jadwalnya WFH
                            </h6>
                            <small class="text-muted">Hugo Studio - 26/09/2024</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
