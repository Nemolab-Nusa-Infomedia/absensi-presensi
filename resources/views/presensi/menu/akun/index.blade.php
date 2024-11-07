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

<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">
                Personal Info
            </h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-wrap align-items-center justify-content-center">
                        <img src="{{ asset('assets/images/users/dummy-avatar.jpg') }}" class="rounded-circle text-center" alt="">
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0 pt-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Nama :
                        </h5>
                        <span class="fs-14 text-muted">{{ Auth::user()->name }}</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Email :
                        </h5>
                        <span class="fs-14 text-muted">{{ Auth::user()->email }}</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Divisi :
                        </h5>
                        <span class="fs-14 text-muted">{{ Auth::user()->divisis->name }}</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Alamat :
                        </h5>
                        <span class="fs-14 text-muted">{{ Auth::user()->address }}</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="" class="btn btn-info disabled">Change Personal Info</a>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="" class="btn btn-orange">Change Password</a>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="{{ route('logout') }}" class="btn btn-danger">Logout</a>
                        </h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
