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
                        <span class="fs-14 text-muted">Jeannette C.
                            Vindra Arya Yulian</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 fw-medium mb-0">
                            Email :
                        </h5>
                        <span class="fs-14 text-muted">jeannette@rhyta.com</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Divisi :
                        </h5>
                        <span class="fs-14 text-muted">Full Stack
                            Developer</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            Alamat :
                        </h5>
                        <span class="fs-14 text-muted">Jalan Kenanga no.17 Grendeng Rt 02/01, Purwokerto Utara</span>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="" class="text-dark">Change Personal Info</a>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="" class="text-warning">Change Password</a>
                        </h5>
                    </div>
                </li>
                <li class="list-group-item border-0 border-bottom px-0">
                    <div class="d-flex flex-wrap align-items-center">
                        <h5 class="me-2 mb-0 fw-medium">
                            <a href="{{ route('logout') }}" class="text-danger">Logout</a>
                        </h5>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
