@extends('presensi.components.layout')

@section('content')
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

<div class="row mx-auto p-0">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">
                    Aktifitas
                </h5>
                <div class="ms-auto">
                    <a href="javascript:void(0);" class="text-primary">Export
                        <i class="bx bx-export ms-1"></i>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <p class="mb-0 mt-2 pe-3 me-2">
                        Senin
                    </p>
                    <div class="position-relative ps-4">
                        <span class="position-absolute start-0 top-0 border border-dashed h-100"></span>
                        <div class="mb-4">
                            <span class="position-absolute start-0 avatar-sm translate-middle-x bg-danger d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-14">UI</span>
                            <div class="d-flex flex-wrap align-items-center gap-2">
                                <div class="d-block">
                                    <h5 class="mb-1 text-start text-dark">
                                        Presensi Kehadiran
                                    </h5>
                                    <h5 class="mb-1 text-start text-dark">
                                        Presensi Pulang
                                    </h5>
                                </div>
                                <div class="ms-auto">
                                    <div class="d-block">
                                        <h5 class="mb-1 text-end text-dark">
                                            12:08:03
                                        </h5>
                                        <h5 class="mb-1 text-end text-dark">
                                            12:08:03
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
