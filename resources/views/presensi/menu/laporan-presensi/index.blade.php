@extends('presensi.components.layout')

@section('content')
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
                <a href="{{ route('izin-cuti') }}">
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

<div class="row mx-auto p-0">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title">
                    Aktifitas
                </h5>
                <div class="ms-auto">
                    <a href="#" class="text-primary">
                        <i class='bx bx-calendar'></i>
                    </a>
                </div>
            </div>
            <div class="card-body scrollable-content">
                @foreach($attendances as $key)
                    <div class="d-flex align-items-start">
                        <p class="mb-0 mt-2 pe-3 me-2 hari">
                            {{ $key['created_at'] }}
                        </p>
                        <div class="position-relative ps-4">
                            <span class="position-absolute start-0 top-0 border border-dashed h-100"></span>
                            <div class="mb-4">
                                <span class="position-absolute start-0 avatar-sm translate-middle-x bg-success d-inline-flex align-items-center justify-content-center rounded-circle text-light fs-20">
                                    <iconify-icon icon="iconamoon:check-circle-1-duotone"></iconify-icon>
                                </span>
                                <div class="d-flex flex-wrap align-items-center gap-2">
                                    <div class="d-block">
                                        <h5 class="mb-1 text-start text-dark">
                                            Presensi Hadir
                                        </h5>
                                        <h5 class="mb-1 text-start text-dark">
                                            Presensi Pulang
                                        </h5>
                                    </div>
                                    <div class="ms-auto">
                                        <div class="d-block">
                                            <h5 class="mb-1 text-end text-dark">
                                                {{ $key['check_in'] }}
                                            </h5>
                                            <h5 class="mb-1 text-end text-dark">
                                                {{ $key['check_out'] }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
@endsection
